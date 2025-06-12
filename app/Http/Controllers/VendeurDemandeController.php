<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use App\Models\VendeurDemande;
use Illuminate\Support\Facades\Auth;

class VendeurDemandeController extends Controller
{
    public function saveDecision(Request $request){
        try {
            $demande = VendeurDemande::with('emplacement')->find($request->demandeId);
            $AncienEmplacement = $demande->emplacement;

            if($demande == null){
                //toastr()->error("Impossible de traiter cette requête", "Vendeur");
                //return back();
                return response()->json(['message' => "Impossible de traiter cette requête"]);
            }
            if($request->decisionValue == "1"){
                $demande->pavillon_id = $request->pavillon_id;
                $demande->emplacement_id = $request->emplacement_id;
                $demande->decision = $request->decisionValue; // on accepte ou on refuse
                $demande->date_decision = date('Y-m-d H:i:s');
                $demande->userValidateur = Auth::user()->id;  // le User qui valider avant le DG         
                $demande->save();                

                $emplacement = Emplacement::find($demande->emplacement_id);
                
                if($emplacement != null){

                    if($AncienEmplacement != null){
                        if($AncienEmplacement->id != $emplacement->id)
                        $ancienEmpl = Emplacement::find($AncienEmplacement->id);
                        $ancienEmpl->etat = 0;  
                        $ancienEmpl->save();           
                    }
                    if($emplacement->etat == 1){
                        return response()->json(['message' => "Emplacement déjà occupé"]);
                    }
                    $emplacement->etat = 1;
                   // $emplacement->save_by = Auth::user()->id;
                    $emplacement->save();
                }
            }

            if($request->decisionValue == "0"){
                //$demande->pavillon_id = $request->pavillon_id;
                $demande->emplacement_id = null; //$request->emplacement_id;
                $demande->decision = $request->decisionValue;
                $demande->date_decision = date('Y-m-d H:i:s');
                $demande->userValidateur = Auth::user()->id;  // le User qui valider avant le DG
                $demande->save();

                if($AncienEmplacement != null){
                    $emplacement = Emplacement::find($AncienEmplacement->id);
                    if($emplacement != null){
                        $emplacement->etat = 0;
                        //$emplacement->save_by = Auth::user()->id;
                        $emplacement->save();
                    }
                }             
            }
            //pavillon_id ; emplacement_id ; decisionValue
            $demandeApresOperation = VendeurDemande::with('emplacement')->find($request->demandeId);
            return response()->json(['status' => 'success', 'myData' => $demandeApresOperation]); //$request->all(); , "reponse" => $demande
        } catch (\Exception $e) {
            // DB::rollback();
             $bug = $e->getMessage();
            return response()->json(['status' => $bug]);
            //return back()->with('error', $bug);
        }
        
    }

    public function deleteOneDemade(Request $request)
    {
        //return $request->all();
        try {
            $dm = VendeurDemande::find($request->article_id);
            if($dm == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            } 
            if($dm->delete()){
                return response()->json(['statut' => 'success', 'myData' => $dm]);
            }
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->getMessage();
            toastr()->error($bug, "Vendeur");
            return back()->with('error', $bug);
            //return back()->with('error', $bug);
        }
    }

    public function ajouterDemande($idVendeur)
    {
        if(empty($idVendeur)){
            toastr()->error("Impossible de traiter cette requête id vendeur oblicatoire", "Vendeur");
            return back();
        }

        $vendeur = Vendeur::find($idVendeur);
        if($vendeur == null){
            toastr()->error("Impossible de traiter cette requête vendeur non trouvé", "Vendeur");
            return back();
        }
        return view('pages.vendeurs.ajouterDemande', compact('vendeur'));
        return $vendeur;

    }
}
