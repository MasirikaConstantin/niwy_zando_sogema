<?php

namespace App\Http\Controllers;

//use GuzzleHttp\Psr7\Request;
use App\Models\Place;
use App\Models\Vendeur;
use App\Models\Posseder;
use App\Models\Concerner;
use Illuminate\Http\Request;
use App\Models\VendeurDemande;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //public $maison_nbr;
    public $messagePermission =  "Vous n'avez pas de permission";

    public function SaveMultipleSelect($request, $vendeurId, $dossierID) {
        if(!empty($request['quantite0']) && isset($request['quantite0'])){
            for($i=1; $i <= $request['quantite0']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->dossier_id = $dossierID;
                $vd->article_id = $request['article0'];
                $vd->place_id = $request['place0'];                
                $vd->quantite = 1;//$request['quantite0'];
                //$vd->pavillon_id = $request['pavillon_id0'];
                //$vd->emplacement_id = $request['emplacement_id'];
                $vd->prix = $request['placePrixInput0'] ?? 0;                
                //$vd->total = ($request['placePrixInput0'] * 1); //$request['totalInput0'] ?? 0;
                $vd->mois = $request['mois0'] ?? 0;
                $vd->total = ($request['placePrixInput0'] * $request['mois0']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite1']) && isset($request['quantite1'])){
            for($i=1; $i <= $request['quantite1']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->dossier_id = $dossierID;
                $vd->article_id = $request['article1'];
                $vd->place_id = $request['place1'];                
                $vd->quantite = 1;//$request['quantite1'];
                $vd->prix = $request['placePrixInput1'] ?? 0;
                //$vd->total = ($request['placePrixInput1'] * 1); //$request['totalInput1'] ?? 0;
                $vd->mois = $request['mois1'] ?? 0;
                $vd->total = ($request['placePrixInput1'] * $request['mois1']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite2']) && isset($request['quantite2'])){
            for($i=1; $i <= $request['quantite2']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->dossier_id = $dossierID;

                $vd->article_id = $request['article2'];
                $vd->place_id = $request['place2'];                
                $vd->quantite = 1;//$request['quantite2'];
                $vd->prix = $request['placePrixInput2'] ?? 0;
                //$vd->total = ($request['placePrixInput2'] * 1); //$request['totalInput2'] ?? 0;
                $vd->mois = $request['mois2'] ?? 0;
                $vd->total = ($request['placePrixInput2'] * $request['mois2']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite3']) && isset($request['quantite3'])){
            for($i=1; $i <= $request['quantite3']; $i++){
                $vd = new VendeurDemande();
                $vd->dossier_id = $dossierID;
                $vd->vendeur_id = $vendeurId;
                $vd->article_id = $request['article3'];
                $vd->place_id = $request['place3'];                
                $vd->quantite = 1;//$request['quantite3'];
                $vd->prix = $request['placePrixInput3'] ?? 0;
                //$vd->total = ($request['placePrixInput3'] * 1); //$request['totalInput3'] ?? 0;
                $vd->mois = $request['mois3'] ?? 0;
                $vd->total = ($request['placePrixInput3'] * $request['mois3']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite4']) && isset($request['quantite4'])){
            for($i=1; $i <= $request['quantite4']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->article_id = $request['article4'];
                $vd->dossier_id = $dossierID;
                $vd->place_id = $request['place4'];                
                $vd->quantite = 1;//$request['quantite4'];
                $vd->prix = $request['placePrixInput4'] ?? 0;
                //$vd->total = ($request['placePrixInput4'] * 1); //$request['totalInput4'] ?? 0;
                $vd->mois = $request['mois4'] ?? 0;
                $vd->total = ($request['placePrixInput4'] * $request['mois4']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite5']) && isset($request['quantite5'])){
            for($i=1; $i <= $request['quantite5']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->article_id = $request['article5'];
                $vd->dossier_id = $dossierID;
                $vd->place_id = $request['place5'];                
                $vd->quantite = 1;//$request['quantite5'];
                $vd->prix = $request['placePrixInput5'] ?? 0;
                //$vd->total = ($request['placePrixInput5'] * 1); //$request['totalInput5'] ?? 0;
                $vd->mois = $request['mois5'] ?? 0;
                $vd->total = ($request['placePrixInput5'] * $request['mois5']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite6']) && isset($request['quantite6'])){
            for($i=1; $i <= $request['quantite6']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->article_id = $request['article6'];
                $vd->dossier_id = $dossierID;
                $vd->place_id = $request['place6'];                
                $vd->quantite = 1;//$request['quantite6'];
                $vd->prix = $request['placePrixInput6'] ?? 0;
                //$vd->total = ($request['placePrixInput6'] * 1); //$request['totalInput6'] ?? 0;
                $vd->mois = $request['mois6'] ?? 0;
                $vd->total = ($request['placePrixInput6'] * $request['mois6']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite7']) && isset($request['quantite7'])){
            for($i=1; $i <= $request['quantite7']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->article_id = $request['article7'];
                $vd->dossier_id = $dossierID;
                $vd->place_id = $request['place7'];                
                $vd->quantite = 1;//$request['quantite7'];
                $vd->prix = $request['placePrixInput7'] ?? 0;
                //$vd->total = ($request['placePrixInput7'] * 1); //$request['totalInput7'] ?? 0;
                $vd->mois = $request['moi7'] ?? 0;
                $vd->total = ($request['placePrixInput7'] * $request['mois7']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite8']) && isset($request['quantite8'])){
            for($i=1; $i <= $request['quantite8']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->dossier_id = $dossierID;
                $vd->article_id = $request['article8'];
                $vd->place_id = $request['place8'];                
                $vd->quantite = 1;//$request['quantite8'];
                $vd->prix = $request['placePrixInput8'] ?? 0;
                //$vd->total = ($request['placePrixInput8'] * 1); //$request['totalInput8'] ?? 0;
                $vd->mois = $request['mois8'] ?? 0;
                $vd->total = ($request['placePrixInput8'] * $request['mois8']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite9']) && isset($request['quantite9'])){
            for($i=1; $i <= $request['quantite9']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->dossier_id = $dossierID;
                $vd->article_id = $request['article9'];
                $vd->place_id = $request['place8'];                
                $vd->quantite = 1;//$request['quantite9'];
                $vd->prix = $request['placePrixInput9'] ?? 0;
                //$vd->total = ($request['placePrixInput9'] * 1); //$request['totalInput9'] ?? 0;
                $vd->mois = $request['mois9'] ?? 0;
                $vd->total = ($request['placePrixInput9'] * $request['mois9']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite10']) && isset($request['quantite10'])){
            for($i=1; $i <= $request['quantite10']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->article_id = $request['article10'];
                $vd->dossier_id = $dossierID;
                $vd->place_id = $request['place10'];                
                $vd->quantite = 1;//$request['quantite10'];
                $vd->prix = $request['placePrixInput10'] ?? 0;
                //$vd->total = ($request['placePrixInput10'] * 1); //$request['totalInput10'] ?? 0;
                $vd->mois = $request['mois10'] ?? 0;
                $vd->total = ($request['placePrixInput10'] * $request['mois10']) * 1;
                $vd->save();
            }
        }

        if(!empty($request['quantite11']) && isset($request['quantite11'])){
            for($i=1; $i <= $request['quantite11']; $i++){
                $vd = new VendeurDemande();
                $vd->vendeur_id = $vendeurId;
                $vd->dossier_id = $dossierID;
                $vd->article_id = $request['article11'];
                $vd->place_id = $request['place11'];                
                $vd->quantite = 1;//$request['quantite11'];
                $vd->prix = $request['placePrixInput11'] ?? 0;
                //$vd->total = ($request['placePrixInput11'] * 1); //$request['totalInput11'] ?? 0;
                $vd->mois = $request['11'] ?? 0;
                $vd->total = ($request['placePrixInput11'] * $request['mois11']) * 1;
                $vd->save();
            }
        }
    }














    public function SaveMultipleSelectMMMM($request, $vendeurId) {
        // if(!empty($request->article0) && isset($request->article0)){
        //     for($i=0; $i < count($request->article0); $i++){
        //         Concerner::create([
        //             'place_id' => $request->place0,
        //             'vendeur_id' => 1,
        //             'article_id' => $request->article0[$i],
        //         ]);                
        //     }
        //     $ps = new Posseder();
        //     $ps->vendeur_id = 1;
        //     $ps->place_id = $request->place0;
        //     $ps->nbr = $request->quantite0 ?? 0;
        //     $ps->maitre_cube = $request->maitreCube0 ?? 0;
        //     $ps->save();
        // }
        //dd($request);
        if(!empty($request['article0']) && isset($request['article0'])){
            for($i=0; $i < count($request['article0']); $i++){
                Concerner::create([
                    'place_id' => $request['place0'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article0'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place0'];
            $ps->nbr = $request['quantite0'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube0'] ?? 0;            
            $ps->prix = $request['placePrixInput0'] ?? 0;
            $ps->total = $request['totalInput0'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article1']) && isset($request['article1'])){
            for($i=0; $i < count($request['article1']); $i++){
                Concerner::create([
                    'place_id' => $request['place1'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article1'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place1'];
            $ps->nbr = $request['quantite1'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube1'] ?? 0;
            $ps->prix = $request['placePrixInput1'] ?? 0;
            $ps->total = $request['totalInput1'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article2']) && isset($request['article2'])){
            for($i=0; $i < count($request['article2']); $i++){
                Concerner::create([
                    'place_id' => $request['place2'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article2'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place2'];
            $ps->nbr = $request['quantite2'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube2'] ?? 0;
            $ps->prix = $request['placePrixInput2'] ?? 0;
            $ps->total = $request['totalInput2'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article3']) && isset($request['article3'])){
            for($i=0; $i < count($request['article3']); $i++){
                Concerner::create([
                    'place_id' => $request['place3'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article3'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place3'];
            $ps->nbr = $request['quantite3'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube3'] ?? 0;
            $ps->prix = $request['placePrixInput3'] ?? 0;
            $ps->total = $request['totalInput3'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article4']) && isset($request['article4'])){
            for($i=0; $i < count($request['article4']); $i++){
                Concerner::create([
                    'place_id' => $request['place4'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article4'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place4'];
            $ps->nbr = $request['quantite4'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube4'] ?? 0;
            $ps->prix = $request['placePrixInput4'] ?? 0;
            $ps->total = $request['totalInput4'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article5']) && isset($request['article5'])){
            for($i=0; $i < count($request['article5']); $i++){
                Concerner::create([
                    'place_id' => $request['place5'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article5'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place5'];
            $ps->nbr = $request['quantite5'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube5'] ?? 0;
            $ps->prix = $request['placePrixInput5'] ?? 0;
            $ps->total = $request['totalInput5'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article6']) && isset($request['article6'])){
            for($i=0; $i < count($request['article6']); $i++){
                Concerner::create([
                    'place_id' => $request['place6'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article6'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place6'];
            $ps->nbr = $request['quantite6'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube6'] ?? 0;
            $ps->prix = $request['placePrixInput6'] ?? 0;
            $ps->total = $request['totalInput6'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article7']) && isset($request['article7'])){
            for($i=0; $i < count($request['article7']); $i++){
                Concerner::create([
                    'place_id' => $request['place7'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article7'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place7'];
            $ps->nbr = $request['quantite7'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube7'] ?? 0;
            $ps->prix = $request['placePrixInput7'] ?? 0;
            $ps->total = $request['totalInput7'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article8']) && isset($request['article8'])){
            for($i=0; $i < count($request['article8']); $i++){
                Concerner::create([
                    'place_id' => $request['place8'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article8'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place8'];
            $ps->nbr = $request['quantite8'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube8'] ?? 0;
            $ps->prix = $request['placePrixInput8'] ?? 0;
            $ps->total = $request['totalInput8'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article9']) && isset($request['article9'])){
            for($i=0; $i < count($request['article9']); $i++){
                Concerner::create([
                    'place_id' => $request['place9'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article9'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place9'];
            $ps->nbr = $request['quantite9'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube9'] ?? 0;
            $ps->prix = $request['placePrixInput9'] ?? 0;
            $ps->total = $request['totalInput9'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article10']) && isset($request['article10'])){
            for($i=0; $i < count($request['article10']); $i++){
                Concerner::create([
                    'place_id' => $request['place10'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article10'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place10'];
            $ps->nbr = $request['quantite10'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube10'] ?? 0;
            $ps->prix = $request['placePrixInput10'] ?? 0;
            $ps->total = $request['totalInput10'] ?? 0;
            $ps->save();
        }

        if(!empty($request['article11']) && isset($request['article11'])){
            for($i=0; $i < count($request['article11']); $i++){
                Concerner::create([
                    'place_id' => $request['place11'],
                    'vendeur_id' => $vendeurId,
                    'article_id' => $request['article11'][$i],
                ]);                
            }
            $ps = new Posseder();
            $ps->vendeur_id = $vendeurId;
            $ps->place_id = $request['place11'];
            $ps->nbr = $request['quantite11'] ?? 0;
            //$ps->maitre_cube = $request['maitreCube11'] ?? 0;
            $ps->prix = $request['placePrixInput11'] ?? 0;
            $ps->total = $request['totalInput11'] ?? 0;
            $ps->save();
        }
        // $request->all();
    }

    
    //$this->maison_nbr = Place::find(1)->nombre_disponible;
    // $table_nbr = Place::find(2)->nombre_disponible;
    // $autre_nbr = Place::find(4)->nombre_disponible;

    public function getPlaceNumber(){
        /*$magasin_nbr = Place::find(1)->nbr_restant;
        $etalage_nbr = Place::find(2)->nbr_restant;
        $kiosque_nbr = Place::find(3)->nbr_restant;
        $entrepot_nbr = Place::find(4)->nbr_restant;
        $chambreFroide_nbr = Place::find(5)->nbr_restant;
        return ['magasin' => $magasin_nbr, 'etalage' => $etalage_nbr, 'kiosque' => $kiosque_nbr, 'entrepot' => $entrepot_nbr, 'chambreFroide' => $chambreFroide_nbr];
    */}
}
