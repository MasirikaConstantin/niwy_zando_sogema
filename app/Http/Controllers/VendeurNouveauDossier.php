<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VendeurNouveauDossier extends Controller
{
    public function storeAjax(Request $request)
{
    $validator = Validator::make($request->all(), [
        //'type_pavillon_id' => 'required|exists:type_pavilons,id',
    ]);

    if ($validator->fails()) {
        return response()->json(['statut'=> 'errorValidate', 'errorsValidateMessage' => $validator->errors()]);
    }

    try {
        $vendeur_id = $request->vendeur_id;
        $numDossiers = DB::table('dossiers')->where('vendeur_id', $vendeur_id)->pluck('numdossier');
        $maxNumDossier = $numDossiers->max();
        $nouveauDossier = $maxNumDossier + 1;
        
        // Créer le dossier et récupérer son ID
        $dossier = Dossier::create([
            'vendeur_id' => $vendeur_id,
            'numdossier' => $nouveauDossier,
            "agent_id" =>Auth::user()->id,
            "datecreation"=>now()->format('Y-m-d'),
            "statut"=>0
        ]);
        
        // Ajouter l'ID du dossier à la requête
        $request_all = $request->all();
        $request_all['dossier_id'] = $dossier->id;
        //return response()->json($request_all);
        $this->SaveMultipleSelect($request_all, $vendeur_id,$dossier->id);
        
        return response()->json([
            'statut' => 'saveSuccess', 
            "message" => "Enregistrement effectué avec succès!",
            "dossier_id" => $dossier->id
        ], 200);
        
    } catch (\Exception $e) {
        $bug = $e->getMessage();
        return response()->json(['statut' => 'error', "message" => $bug]);
    }
}
}
