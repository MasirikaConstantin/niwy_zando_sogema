<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Place;
use App\Models\Pavillon;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmplacementController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $emplacements = Emplacement::with('pavillon','place')->orderBy('numero', "ASC")->get();
            //return $emplacements;
            return view('pages.emplacement.indexTableau', compact('emplacements'));  
        }
        //$emplacements = Emplacement::with('pavillon','place')->orderBy('numero', "ASC")->get();
        $pavillons = Pavillon::orderBy('numero', "ASC")->get();
        $places = Place::orderBy('nom', "ASC")->get();
        $articles = Article::orderBy('nom', "ASC")->select("id",'nom')->get();
        $emplacementsCounts = Emplacement::count();
        //return view('pages.emplacement.index', compact('emplacements','pavillons','places'));
        return view('pages.emplacement.index', compact('emplacementsCounts','pavillons','places','articles'));
    }

    public function store(Request $request){
        //return $request->all();
        $validator = $request->validate([
            'pavillonId' => 'required',
            'placeId' => 'required',
            'numero' => 'required',
        ]);

        try {
            $empl = new Emplacement();
            $empl->pavillon_id  = $request->pavillonId;
            $empl->place_id  = $request->placeId;
            $empl->article_id  = $request->articleId;
            $empl->numero = $request->numero;
            $empl->save_by = Auth::user()->id;
            $empl->save();
            if ($empl) {
                //toastr()->success("Emplacement enregistré avec success!");
                return back()->with('success', "Emplacement enregistré avec success!");
            } else {
                //toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                return back()->with('error', "Erreur lors de l'enregistrement! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    public function update(Request $request, $id) {
        $validator = $request->validate([
            'pavillonId' => 'required',
            'placeId' => 'required',
            'numero' => 'required',
        ]);

        try {
            $empl = Emplacement::find($id);
            if($empl == null){
                return back()->with('error', "Impossible de traiter cette requête!");
            }
            $empl->pavillon_id  = $request->pavillonId;
            $empl->place_id  = $request->placeId;
            $empl->numero = $request->numero;
            $empl->save_by = Auth::user()->id;
            $empl->save();
            if ($empl) {
                //toastr()->success("Emplacement enregistré avec success!");
                return back()->with('success', "Emplacement modifié avec success!");
            } else {
                //toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                return back()->with('error', "Erreur lors de modification! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    public function getEmplacementByPavillon(Request $request) {
        try {
            $idPavillon = $request->pavillon_id;
            $idPlace = $request->place_id;
            //$empl = Emplacement::with('place')->where('pavillon_id', $idPavillon)->where('etat', 0)->get();
            $empl = Emplacement::with('place')
                                ->where('pavillon_id', $idPavillon)
                                ->where('place_id', $idPlace)
                                ->where('etat', 0)->get();
            return $empl; //"pv ".$idPavillon. "-". "pl ".$idPlace;
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return response()->json(['error' => $bug]); //back()->with('error', $bug);
        }
    }

    public function getEmplacementByIdArticle(Request $request) {
        try {
            $article_id = $request->secteurActiviteId;
            $emplacements = Emplacement::with('place','place.typePlace')->where('article_id', $article_id)->where('etat', 0)->get();
            //return $emplacements->count();
            $places = Emplacement::join('places', 'places.id', '=', 'emplacements.place_id')
                                ->join('type_places', 'type_places.id', '=','places.type_place_id')
                                ->selectRaw('DISTINCT emplacements.place_id AS unique_id_place, places.nom AS place_nom, places.prix AS place_prix, places.orientation AS place_orientation,type_places.nom AS type_place_nom, type_places.dimension')
                                ->where('emplacements.article_id', $article_id)->where('etat', 0)
                                ->get();

            // $places = Emplacement::join('places', 'places.id', '=', 'emplacements.place_id')
            //                     ->join('type_places', 'type_places.id', '=','places.type_place_id')
            //                     ->selectRaw('DISTINCT emplacements.place_id AS unique_id_place')
            //                     ->where('emplacements.article_id', 2)
            //                     ->where('etat', 0)
            //                     ->get();
            //return  $places;
            return response()->json(['emplacements' => $emplacements, 'places' => $places]);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return response()->json(['error' => $bug]); //back()->with('error', $bug);
        }
    }
}