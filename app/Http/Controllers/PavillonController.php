<?php

namespace App\Http\Controllers;

use App\Models\Pavillon;
use App\Models\Emplacement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PavillonController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            $pavillons = Pavillon::orderBy('numero', "ASC")->get();
            return view('pages.pavillons.indexTableau', compact('pavillons'));  
        }
        $pavillonsCounts = Pavillon::count();
        return view('pages.pavillons.index', compact('pavillonsCounts'));
    }

    public function store(Request $request){
        $validator = $request->validate([
            'nom' => 'required',
            'niveau' => 'required',
        ]);

        try {
            $pavillon = new Pavillon();
            $pavillon->numero = $request->nom;
            $pavillon->niveau = $request->niveau;
            $pavillon->user_id = Auth::user()->id;
            $pavillon->save();
            if ($pavillon) {
                toastr()->success("Pavillon enregistré avec success!");
                return back();//->with('success', "Pavillon enregistré avec success!");
            } else {
                toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                return back()->with('error', "Erreur lors de l'enregistrement! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    public function edit($id){
        $pavillon = Pavillon::find($id);
        if($pavillon == null){
            return back()->with('error', "Impossible de traiter cette requête!");
        }
        return view('pages.pavillons.edit', compact('pavillon'));
    }

    public function search(Request $request) {
        if($request->ajax()) {
            $pavillons = Pavillon::where('numero', 'LIKE', '%' . $request->getValueInput . '%')->orderBy('numero', "ASC")->get();
            return view('pages.pavillons.indexTableau', compact('pavillons'));  
            //return response()->json(['statut'=>"success", 'myData'=>$pavillons]);
        }
        // $pavillonsCounts = Pavillon::count();
        // return view('pages.pavillons.index', compact('pavillonsCounts'));

        // $articles = Article::where('nom', 'LIKE', '%' . $request->q . '%')->orderBy('nom', "ASC")->get();

    }

    public function update(Request $request, $id) {
        
        $validator = $request->validate([
            'nom' => 'required',
        ]);

        try {
            $pavillon = Pavillon::find($id);
            if($pavillon == null){
                return back()->with('error', "Impossible de traiter cette requête!");
            }
            $pavillon->numero = $request->nom;
            $pavillon->niveau = $request->niveau;
            $pavillon->user_id = Auth::user()->id;
            $pavillon->save();
            if ($pavillon) {
                toastr()->success("Pavillon Modifié avec success!");
                return redirect()->route('pavillon.index');//->with('success', "Pavillon enregistré avec success!");
            } else {
                toastr()->error("Erreur lors de la Modification! essayer a nouveau!");
                return back(); //->with('error', "Erreur lors de la Modification! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    public function getPavillonBySecteurActiviterIdAndPlaceId($secteurActiviterId, $placeId)
    {
        // $secteurActiviterId = 23;
        // $placeId = 15;

        //GROUP_CONCAT ,"places.*" "pavillons.*" pavillons.id,  DB::raw(GROUP_CONCAT(pavillons.numero) as pavillonNumere)
        //DB::table(); 
        
        $pavillons = Emplacement::join("pavillons", "pavillons.id","=","emplacements.pavillon_id")
                        ->join("places", "places.id","=","emplacements.place_id")
                        ->selectRaw("                           
                            pavillons.id as pavillonsId,
                            GROUP_CONCAT(DISTINCT pavillons.numero) as pavillonNumero,
                            GROUP_CONCAT(DISTINCT pavillons.niveau) as pavillonNiveau
                        ")
                        ->where('article_id', '=', $secteurActiviterId)
                        ->where('places.id', '=', $placeId)
                        ->groupBy('pavillons.id')
                        ->get();
        return $pavillons;//->count();
    }

    public function statistiquePavillons(Request $request)
    {
        if($request->ajax()) {
            $pavillonStatisque = DB::table('pavillons')
                        ->leftJoin('emplacements', 'pavillons.id', '=', 'emplacements.pavillon_id')
                        ->selectRaw('pavillons.numero as pavillonNumero, 
                            GROUP_CONCAT(DISTINCT pavillons.id) as pavillonId,
                            GROUP_CONCAT(DISTINCT pavillons.niveau) as pavillonNiveau,
                            COUNT(CASE WHEN emplacements.etat = 0 THEN 1 END) as nombreEmplacementLibre, 
                            COUNT(CASE WHEN emplacements.etat = 1 THEN 1 END) as nombreEmplacementOccupe,
                            COUNT(CASE WHEN emplacements.etat IN (0, 1) THEN 1 END) as nombreEmplacementTotal                            
                        ')
                        //->where('pavillons.numero', '=', "BOLINGO")
                        ->groupBy('pavillons.id', 'pavillons.numero')
                        ->orderBy('pavillons.numero', 'asc')
                        ->get();
        
            if($request->counter == "counter"){
                return response()->json(['statut'=>"ok", 'myDataCounts'=> $pavillonStatisque->count()], 200);
            }
            //return $pavillonStatisque;
            return view('pages.statistique.pavillon.indexListe', compact('pavillonStatisque'));  
        }
        
        $pavillonsCounts = Pavillon::count();
        return view('pages.statistique.pavillon.index', compact('pavillonsCounts'));
    }

    public function statistiquePavillonsSearch(Request $request)
    {
        //return $request->all();//$request->all();
        //if($request->ajax()) {
            $pavillonStatisque = DB::table('pavillons')
                        ->leftJoin('emplacements', 'pavillons.id', '=', 'emplacements.pavillon_id')
                        ->selectRaw('pavillons.numero as pavillonNumero,
                            GROUP_CONCAT(DISTINCT pavillons.id) as pavillonId,
                            GROUP_CONCAT(DISTINCT pavillons.niveau) as pavillonNiveau,
                            COUNT(CASE WHEN emplacements.etat = 0 THEN 1 END) as nombreEmplacementLibre, 
                            COUNT(CASE WHEN emplacements.etat = 1 THEN 1 END) as nombreEmplacementOccupe,
                            COUNT(CASE WHEN emplacements.etat IN (0, 1) THEN 1 END) as nombreEmplacementTotal                            
                        ')
                        ->where('pavillons.numero', 'like', "%". $request->myInputRecherche . "%") //A3 - 001 $request->myInputRecherche
                        //->where('pavillons.numero', '=', "BOLINGO")
                        ->groupBy('pavillons.id', 'pavillons.numero')
                        ->orderBy('pavillons.numero', 'asc')
                        ->get();
            
            if($request->counter == "counter"){
                return response()->json(['statut'=>"ok", 'myDataCounts'=> $pavillonStatisque->count()], 200);
            }
            //return "dd";
            //return $pavillonStatisque;
            return view('pages.statistique.pavillon.indexListe', compact('pavillonStatisque'));  
        //}
        // $pavillonsCounts = Pavillon::count();
        // return view('pages.statistique.pavillon.index', compact('pavillonsCounts'));
    }

    public function pavillonDetailsEmplacement(Request $request, $idPavillon)
    {
        if($request->ajax()) {
            $pavillonStatisqueDetails = DB::table('pavillons')
                        ->leftJoin('emplacements', 'pavillons.id', '=', 'emplacements.pavillon_id')
                        ->selectRaw(' 
                            pavillons.numero as pavillonNumero,
                            pavillons.id as pavillonId,
                            pavillons.niveau as pavillonNiveau,                   
                            emplacements.numero as emplacementNumero,                     
                            emplacements.etat as emplacementStat                   
                        ')
                        ->where('pavillons.id', '=', $idPavillon)
                        ->get();
            //return $pavillonStatisqueDetails;
            return view('pages.statistique.pavillon.pavillonDetailsListe', compact("idPavillon","pavillonStatisqueDetails"));
        }
        
        $pavilloneEmplacementCounts = DB::table('emplacements')->where('emplacements.pavillon_id', '=', $idPavillon)->count(); //, compact('pavillonStatisqueDetails')
        return view('pages.statistique.pavillon.pavillonDetails', compact("idPavillon","pavilloneEmplacementCounts"));
    }
}
