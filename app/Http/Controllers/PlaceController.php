<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\TypePlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::with('typePlace')->orderBy('nom', "ASC")->get();
        $placeTypes = TypePlace::orderBy('nom', "ASC")->get();
        //return $places;
        return view('pages.places.index', compact('places','placeTypes'));
    }

    public function store(Request $request){
        $validator = $request->validate([
            'nom' => 'required',
        ]);

        try {
            $place = new Place();
            $place->nom = $request->nom;
            $place->prix = $request->prix;
            $place->type_place_id = $request->typePlace;            
            $place->orientation = $request->orientation;   
            $place->save_by = Auth::user()->id;
            $place->save();
            if ($place) {
                toastr()->success("Place enregistré avec success!");
                return back();//->with('success', "Place enregistré avec success!");
            } else {
                toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                return back()->with('error', "Erreur lors de l'enregistrement! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    public function update(Request $request, $id){
        $validator = $request->validate([
            'nom' => 'required',
        ]);

        try {
            $place = Place::find($id);
            if($place == null){
                return back()->with('error', "Impossible de traiter cette requête!");
            }
            $place->nom = $request->nom;
            $place->prix = $request->prix;
            $place->type_place_id = $request->typePlace;            
            $place->orientation = $request->orientation;   
            $place->save_by = Auth::user()->id;
            $place->save();
            if ($place) {
                return back()->with('success', "Place modifié avec succès " .$request->nom );
            } else {
                return back()->with('error', 'Erreur lors de la modification! essayer a nouveau');
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function getPrixById(Request $request) {
        //return $request->idPlace;
        try {
            $place =  $place = Place::with('emplacements')->find($request->idPlace);
            //$emplacementNbrByPlace =  $place = Place::find($request->idPlace);
            if($place == null){
                return "Impossible de traiter cette requête!";//back()->with('error', "Impossible de traiter cette requête!");
            }
            return $place;
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return response()->json($bug); //redirect()->back()->with('error', $bug);
        }
    }

    public function statistiquePlaceDashboard(Request $request)
    {
        if($request->ajax()) { 

            $requette = "";
            if(isset($request->myInputRecherche) && !empty($request->myInputRecherche)){
                $requette = $request->myInputRecherche;
            }else{
                $requette = "";
            }
            //return "ok";
            $placeStatistique = DB::table('places')
                        ->leftJoin('emplacements', 'places.id', '=', 'emplacements.place_id')
                        ->join('type_places', 'places.type_place_id', '=', 'type_places.id')
                        ->selectRaw('places.nom as placeNom, 
                            GROUP_CONCAT(DISTINCT type_places.nom) as typePlaceNom, 
                            COUNT(CASE WHEN emplacements.etat = 0 THEN 1 END) as nombreEmplacementLibre,
                            COUNT(CASE WHEN emplacements.etat = 1 THEN 1 END) as nombreEmplacementOccupe,
                            COUNT(CASE WHEN emplacements.etat IN (0, 1) THEN 1 END) as nombreEmplacementTotal 
                                      
                        ')
                        ->where('places.nom', 'like', "%". $requette . "%")
                        ->groupBy('places.nom', 'type_places.nom')
                        ->orderBy('places.nom',  'asc')
                        ->get();
            //return ($placeStatistique);
            //console.log($placeStatistique);
            if($request->counter == "counter"){
                return response()->json(['statut'=>"ok", 'myDataCounts'=> $placeStatistique->count()], 200);
            }
            //return $pavillonStatisque;
            return view('pages.statistique.place.indexListeDashboard', compact('placeStatistique'));  
        } 

        $placesCounts = Place::count();
        return view('pages.statistique.place.index', compact('placesCounts'));
    }

    public function statistiquePlace(Request $request)
    {
        if($request->ajax()) { 

            $requette = "";
            if(isset($request->myInputRecherche) && !empty($request->myInputRecherche)){
                $requette = $request->myInputRecherche;
            }else{
                $requette = "";
            }
            //return "ok";
            $placeStatistique = DB::table('places')
                        ->leftJoin('emplacements', 'places.id', '=', 'emplacements.place_id')
                        ->join('type_places', 'places.type_place_id', '=', 'type_places.id')
                        ->selectRaw('places.nom as placeNom, 
                            GROUP_CONCAT(DISTINCT places.id) as placeId,
                            GROUP_CONCAT(DISTINCT places.orientation) as placeOrientation,
                            GROUP_CONCAT(DISTINCT type_places.nom) as typePlaceNom, 
                            COUNT(CASE WHEN emplacements.etat = 0 THEN 1 END) as nombreEmplacementLibre,
                            COUNT(CASE WHEN emplacements.etat = 1 THEN 1 END) as nombreEmplacementOccupe,
                            COUNT(CASE WHEN emplacements.etat IN (0, 1) THEN 1 END) as nombreEmplacementTotal 
                                      
                        ')
                        ->where('places.nom', 'like', "%". $requette . "%")
                        ->groupBy('places.id', 'places.nom')
                        ->orderBy('places.nom', 'asc')
                        ->get();
        
            if($request->counter == "counter"){
                return response()->json(['statut'=>"ok", 'myDataCounts'=> $placeStatistique->count()], 200);
            }
            //return $pavillonStatisque;
            return view('pages.statistique.place.indexListe', compact('placeStatistique'));  
        } 

        $placesCounts = Place::count();
        return view('pages.statistique.place.index', compact('placesCounts'));
    }

    // public function placeDetailsEmplacement(Request $request, $idPlace)
    // {
    //     if($request->ajax()) {
    //         $pavillonStatisqueDetails = DB::table('places')
    //                     ->leftJoin('emplacements', 'places.id', '=', 'emplacements.place_id')
    //                     ->selectRaw(' 
    //                         pavillons.numero as pavillonNumero,
    //                         pavillons.id as pavillonId,
    //                         pavillons.niveau as pavillonNiveau,                   
    //                         emplacements.numero as emplacementNumero,                     
    //                         emplacements.etat as emplacementStat                   
    //                     ')
    //                     ->where('pavillons.id', '=', $idPlace)
    //                     ->get();
    //         //return $pavillonStatisqueDetails;
    //         return view('pages.statistique.place.placeDetailsListe', compact("idPlace","placeStatisqueDetails"));
    //     }
        
    //     $pavilloneEmplacementCounts = DB::table('emplacements')->where('emplacements.pavillon_id', '=', $idPlace)->count(); //, compact('pavillonStatisqueDetails')
    //     return view('pages.statistique.pavillon.pavillonDetails', compact("idPavillon","pavilloneEmplacementCounts"));
    // }

    public function placeDetailsEmplacement(Request $request, $idPlace)
    {
        if($request->ajax()) { 
            $placeStatisqueDetails = DB::table('places')
                        ->leftJoin('emplacements', 'places.id', '=', 'emplacements.place_id')
                        ->join('type_places', 'places.type_place_id', '=', 'type_places.id')
                        ->selectRaw(' 
                            places.nom as nomPlace,
                            type_places.nom as nomTypePlace,
                            places.orientation as orientationPlace,                   
                            emplacements.numero as emplacementNumero,                     
                            emplacements.etat as emplacementStat                   
                        ')
                        ->where('places.id', '=', $idPlace)
                        ->get();
            //dd($placeStatisqueDetails);
            //return $placeStatisqueDetails;
            return view('pages.statistique.place.placeDetailsListe', compact("idPlace","placeStatisqueDetails"));
        }
        
        $placeEmplacementCounts = DB::table('emplacements')->where('emplacements.place_id', '=', $idPlace)->count(); //, compact('pavillonStatisqueDetails')
        //dd($placeEmplacementCounts); 
        return view('pages.statistique.place.placeDetails', compact("idPlace","placeEmplacementCounts"));
    }
}
