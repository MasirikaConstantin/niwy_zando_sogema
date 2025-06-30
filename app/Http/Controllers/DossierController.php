<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\VendeurDemande;
use App\Models\Vendeur;
use App\Models\Article;
use App\Models\Place;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DossierController extends Controller
{
    public function index()
    {
        $dossiers = Dossier::with(['vendeur', 'vendeurDemandes.article', 'vendeurDemandes.place', "agent"])
                          ->orderBy('created_at', 'desc')
                          ->paginate(15);
        
        return view('pages.dossier.index', compact('dossiers'));
    }

    public function create($vendeur_id)
    {
        $vendeur = Vendeur::findOrFail($vendeur_id);
        $articles = Article::orderBy('nom', 'ASC')->get();
        //return view('pages.dossier.create', compact('vendeur', 'articles'));
        return view('pages.dossier.createNewDossies', compact('vendeur', 'articles'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'vendeur_id' => 'required|exists:vendeurs,id',
            'demandes' => 'required|array|min:1',
            'demandes.*.article_id' => 'required|exists:articles,id',
            'demandes.*.place_id' => 'required|exists:places,id',
            'demandes.*.quantite' => 'required|numeric|min:1',
            'demandes.*.mois' => 'required|numeric|min:7',
        ]);

        try {
            DB::beginTransaction();

            // Créer le dossier
            $dossier = Dossier::create([
                'vendeur_id' => $request->vendeur_id,
                'agent_id' => Auth::user()->id,
                'etat' => 'attente',
                "nbr_table" => array_sum(array_column($request->demandes, 'quantite')),
                'datecreation' => now()->format('Y-m-d'),
            ]);

            // Créer les demandes
            foreach ($request->demandes as $demande) {
                $place = Place::findOrFail($demande['place_id']);
                $total = ($place->prix * $demande['mois']) * $demande['quantite'];

                VendeurDemande::create([
                    'dossier_id' => $dossier->id,
                    'article_id' => $demande['article_id'],
                    'place_id' => $demande['place_id'],
                    'quantite' => $demande['quantite'],
                    'prix' => $place->prix,
                    'mois' => $demande['mois'],
                    'total' => $total,
                ]);
            }

            DB::commit();

            return redirect()->route('dossier.show', $dossier->id)
                           ->with('success', 'Dossier créé avec succès');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()
                        ->with('error', 'Erreur lors de la création du dossier: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $dossier = Dossier::with(['vendeur', 'vendeurDemandes.article', 'vendeurDemandes.place'])
                         ->findOrFail($id);
        
        return view('pages.dossier.show', compact('dossier'));
    }

    public function edit($id)
    {
        $dossier = Dossier::with(['vendeur', 'vendeurDemandes'])
                         ->findOrFail($id);
        $articles = Article::all();
        
        return view('pages.dossier.edit', compact('dossier', 'articles'));
    }

    public function update(Request $request, $id)
    {
        $dossier = Dossier::findOrFail($id);
        
        $request->validate([
            'demandes' => 'required|array|min:1',
            'demandes.*.article_id' => 'required|exists:articles,id',
            'demandes.*.place_id' => 'required|exists:places,id',
            'demandes.*.quantite' => 'required|numeric|min:1',
            'demandes.*.mois' => 'required|numeric|min:7',
        ]);

        try {
            DB::beginTransaction();

            // Supprimer les anciennes demandes
            $dossier->vendeurDemandes()->delete();

            // Créer les nouvelles demandes
            foreach ($request->demandes as $demande) {
                $place = Place::findOrFail($demande['place_id']);
                $total = ($place->prix * $demande['mois']) * $demande['quantite'];

                VendeurDemande::create([
                    'dossier_id' => $dossier->id,
                    'article_id' => $demande['article_id'],
                    'place_id' => $demande['place_id'],
                    'quantite' => $demande['quantite'],
                    'prix' => $place->prix,
                    'mois' => $demande['mois'],
                    'total' => $total,
                ]);
            }

            DB::commit();

            return redirect()->route('pages.dossier.show', $dossier->id)
                           ->with('success', 'Dossier modifié avec succès');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()
                        ->with('error', 'Erreur lors de la modification: ' . $e->getMessage());
        }
    }

    // API Routes pour AJAX
    public function getAllArticles()
    {
        $articles = Article::where('statut', 'actif')->get();
        return response()->json($articles);
    }

    public function getEmplacementByIdArticle(Request $request)
    {
        $article = Article::with(['places', 'emplacements'])->findOrFail($request->secteurActiviteId);
        
        $places = $article->places()->with('emplacements')->get();
        $emplacements = $article->emplacements;
        
        return response()->json([
            'places' => $places,
            'emplacements' => $emplacements
        ]);
    }

    public function getPrixById(Request $request)
    {
        $place = Place::with('emplacements')->findOrFail($request->idPlace);
        return response()->json($place);
    }
}