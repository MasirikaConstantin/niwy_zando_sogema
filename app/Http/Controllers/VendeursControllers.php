<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vendeur;
use App\Models\VendeurDemande;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VendeursControllers extends Controller
{
    public function index()
    {
        $vendeurCounts = Vendeur::count();
        return view('pages.vendeurs.index', compact('vendeurCounts'));
    }

    public function getVendeurs()
    {
        $vendeurs = Vendeur::select('id', 'nom', 'postnom', 'prenom', 'telephone', 'created_at')->get();
        return response()->json($vendeurs);
    }
    public function getSearchAllByDate(Request $request)
    {
        $vendeurs = Vendeur::whereBetween('created_at', [$request->getDateDebutValue, $request->getDateFinValue])->orderBy('created_at', 'ASC')->get();
        return response()->json($vendeurs);
    }
    public function getSearchAllByName(Request $request)
    {
        $vendeurs = Vendeur::where('nom', 'like', '%' . $request->myInputRecherche . '%')->orderBy('nom', 'ASC')->get();
        return response()->json($vendeurs);
    }
    public function getDossierVendeur($id)
    {
        $vendeur = Vendeur::with('dossiers')->find($id);
        return response()->json($vendeur);
    }
    public function saveDecisionBanque(Request $request)
    {
        //return Auth::user();
        $validator = Validator::make($request->all(), [
            'idVendeurDemande' => 'required',
            //'nom_agent' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
        $user = User::find($request->user_id);


        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }

        try{

            for ($i = 0; $i < count($request->idVendeurDemande); $i++) {

                $vd = VendeurDemande::where('id', $request->idVendeurDemande[$i])->first();
            
                if ($vd) {
                    $vd->decision_banque = 1;
                    $vd->date_decision_banque = now(); // plus propre
                    $vd->nom_agent_banque = $user->nom;
                    $vd->save();
                } else {
                    // Optionnel : log ou retour en erreur
                    Log::warning("Aucun VendeurDemande trouvé pour dossier_id = " . $request->idVendeurDemande[$i]);
                }
            }
            
            $vendeurDemande = VendeurDemande::find($request->idVendeurDemande['0']);
            //return response()->json($vendeurDemande);

            if($vendeurDemande == null){
                response()->json(['statut' => 'errorValidate', 'errorsValidateMessage' => "Impossible de traiter cette requête! demande vendeur introuvable"]);
            }

            if(!empty($vendeurDemande->vendeur_id)){
                $dossier = Dossier::find($vendeurDemande->dossier_id);

                if(!$dossier)
                {
                    response()->json(['statut' => 'errorValidate', 'errorsValidateMessage' => "Impossible de traiter cette requête! dossier introuvable"]);
                }
               try{
                $dossier->etat = "payer";
                $dossier->date_paiment = now();
                $dossier->decision_banque = 1;
                $dossier->agentBanque = $user->id ;
                $dossier->save();
               }catch (\Exception $e) {
                $bug = $e->getMessage();
                return response()->json(['status' => $bug]);
               }

            }
            
            // $vd->decision_banque = '1';
            // $vd->date_decision_banque = date('Y-m-d H:i:s');
            // $vd->nom_agent_banque = Auth::user()->fullname() ?? "Inconnu"; //$request->nom_agent ?? "Inconnu";
            // if($vd->save()){
            //     return response()->json(['statut' => 'saveOk', 'reponse' => $request->all()]);
            // }else{
            //     return response()->json(['statut' => 'errorValidate', 'errorMessage' => "Erreur lors de l'enregistrement"]);
            // } 
            toastr()->success("Enregistrement effectué avec succés", "Vendeur");

            return back();          
        }catch (\Exception $e) {
            // DB::rollback();
            $bug = $e->getMessage();
            return back()->with('error', $bug);
         }
    }
    public function TransAuthDossierDetails($dossierId, Request $request){
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);
        $user = User::find($validated['user_id']);
        try {
            $dossier = Dossier::with(['vendeurDemandes' => function($query) {
                $query->where('decision', 1);
            }])->findOrFail($dossierId);
        
            $viewContent = view('partials.dossier_details', [
                'dossier' => $dossier,
                'currentUser' => $user
            ])->render();
            return response()->json($viewContent);
        
            // Debug: vérifiez si le contenu est généré
            if(empty($viewContent)) {
                Log::error("La vue partielle n'a retourné aucun contenu", [
                    'dossier' => $dossier->toArray(),
                    'user' => $user->toArray()
                ]);
            }
        
            return response()->json([
                'html' => $viewContent,
                'debug' => [ // Optionnel pour le développement
                    'dossier_exists' => !!$dossier,
                    'user_exists' => !!$user,
                    'view_path' => view()->getFinder()->find('partials.dossier_details')
                ]
            ]);
        
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTrace() // Seulement en développement
            ], 500);
        }
        
    }
}
