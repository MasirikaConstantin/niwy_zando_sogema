<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Place;
use App\Models\Article;
use App\Models\Vendeur;
use App\Models\Pavillon;
use App\Models\Posseder;
use App\Models\Concerner;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use App\Profondeur\Profondeur;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Treatement;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\VendeurResource;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use App\Http\Controllers\Treatement;

class VendeurController extends Controller
{
    public function index(Request $request){
        //return Vendeur::with('agent','userValidation','places','articles')->orderBy('id', 'ASC')->get();
       // return VendeurResource::collection(Vendeur::with('agent','userValidation')->orderBy('id', 'ASC')->get());
        if($request->ajax()) {
            $vendeurs = VendeurResource::collection(Vendeur::with('agent','userValidation')->orderBy('id', 'ASC')->get());
            return view('pages.vendeurs.listeDonnees', compact('vendeurs'));            
            //return response()->json(['statut'=>"dataExiste", 'myData'=> $vendeurs], 200);
        }
        //return $placeNumber =  $this->getPlaceNumber();
        $placeNumber =  $this->getPlaceNumber();
        $vendeurs = [];
        $vendeurCounts = Vendeur::count();
        return view('pages.vendeurs.liste', compact('vendeurs','placeNumber','vendeurCounts'));
    }

    public function create(){
        $articles = []; //Article::get();
        $pavillons = []; //Pavillon::all();
        $places = Place::with('typePlace')->orderBy('nom', "ASC")->get();
        //return $places;
        return view('pages.vendeurs.create', compact('articles', 'pavillons','places'));
    }

    public function store(Request $request)
    {        
        // $validator = $request->validate([
        //     'type_pavillon_id' => 'required|exists:type_pavilons,id',
        //     'pavillon_id' => 'required',
        //     'nom' => 'required',
        //     'prenom' => 'required',
        //     'sexe' => 'required',
        //     'lieu_naissance' => 'required',
        //     'residence' => 'required',
        //     'telephone' => 'required',
        // ]);
       
       // DB::beginTransaction();
        try {
            $vend = new Vendeur();
            $vend->code_unique = Profondeur::codeUnique($vend, 'code_unique', 6, 'KN/ZD/'.date('Y').'/');
            $vend->nom = $request->nom;
            $vend->postnom = $request->postnom;
            $vend->prenom = $request->prenom;
            $vend->sexe = $request->sexe;
            $vend->lieu_naissance = $request->lieu_naissance;
            $vend->date_naissance = $request->date_naissance;
            $vend->residence = $request->residence;
            $vend->telephone = $request->telephone;
            $vend->nationalite = $request->nationalite;
            $vend->etat_civil = $request->etat_civil;           
            $vend->commune = $request->commune;

            $vend->agent_id = Auth::user()->id;
            //$vend->type_pavillon_id = $request->type_pavillon_id;
            $vend->datecreation = date('Y-m-d'); //$request->datecreation;
            //$vend->nom_chef_pavillon = $request->nom_chef_pavillon;
            //$vend->save();

            $nbrArticles = 20; // on fixe les nombre d'article 20 
            $this->SaveMultipleSelect($request->all(), $vendeurId=1);
            //return $request->all(); 
            
            //DB::commit();
            if ($vend) {
                toastr()->success('"Enregistrement effectué avec success!');
                return back()->with('success', "Enregistrement effectué avec success!");
            } else {
                //redirect('user/create')->with('error', 'Erreur lors de la creationr! essayer a nouveau');
                toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                return back()->with('error', "Erreur lors de l'enregistrement! essayer a nouveau");
            }
           
        } catch (\Exception $e) {
           // DB::rollback();
            $bug = $e->getMessage();
            //return response()->json(['status' => $bug]);
            return back()->with('error', $bug);
        }
        //return $request->all();
    }

    public function storeAjax(Request $request){
        //dd(response()->json(['statut' => 'saveSuccess', "message"=>request('uploadImg')]));
        //return response()->json(['statut' => 'saveSuccess', "message"=>request('uploadImg')]);
        //return response()->json(['statut' => 'saveSuccess', "message"=>$request->all()]);
        $validator = Validator::make($request->all(), [
            //'type_pavillon_id' => 'required|exists:type_pavilons,id',
            // 'pavillon_id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'lieu_naissance' => 'required',
            'residence' => 'required',
            'telephone' => 'required',
            // 'article0' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['statut'=> 'errorValidate', 'errorsValidateMessage' => $validator->errors()]);
        }

        //DB::beginTransaction();
        try {
            $vend = new Vendeur();
            $vend->code_unique = Profondeur::codeUnique($vend, 'code_unique', 6, 'KN/ZD/'.date('Y').'/');
            $vend->nom = $request->nom;
            $vend->postnom = $request->postnom;
            $vend->prenom = $request->prenom;
            $vend->sexe = $request->sexe;
            $vend->lieu_naissance = $request->lieu_naissance;
            $vend->date_naissance = $request->date_naissance;
            $vend->residence = $request->residence;
            $vend->telephone = $request->telephone;
            $vend->nationalite = $request->nationalite;
            $vend->etat_civil = $request->etat_civil;           
            $vend->commune = $request->commune;

            $vend->agent_id = Auth::user()->id;
            //$vend->type_pavillon_id = $request->type_pavillon_id;
            $vend->datecreation = date('Y-m-d H:i:s'); //$request->datecreation;
            //$vend->nom_chef_pavillon = $request->nom_chef_pavillon;
            $vend->numero_patente = $request->numero_patente;
            $vend->rccm = $request->rccm;
            $vend->piece_identite = $request->piece_identite;
            $vend->piece_identite_date_expiration = $request->piece_identite_date_expiration;
            //$vend->personne_de_reference = $request->personne_de_reference;
            $vend->numero_national =  $request->numero_national;
            $vend->ancien_nouveau =  $request->statut;
            
            $filename = '';
            if ($request->hasfile('uploadImg')) {
                $extension = request('uploadImg')->getClientOriginalExtension();
                $file_title = Treatement::slug_title($request->nom) . '_' . time() . '.' . $extension;
                $filename = $request->uploadImg->storeAs('avatars', $file_title);
            }
            $vend->photo = $filename;
            
            $vend->save();

            $nbrArticles = 20; // on fixe les nombre d'article 20 
            $this->SaveMultipleSelect($request->all(), $vend->id);
            //return $request->all(); 
            
            //DB::commit();
            if ($vend) {
                //toastr()->success('"Enregistrement effectué avec success!');
                //return back()->with('success', "Enregistrement effectué avec success!");
                $myUrl = "{{redirect()->route('vend.fichePDF', $vend->id)}}";
                return response()->json(['statut' => 'saveSuccess', "message"=>"Enregistrement effectué avec success!", "myData"=> $vend->id, "myUrl" => $myUrl], 200);
            } else {
                //toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                //return back()->with('error', "Erreur lors de l'enregistrement! essayer a nouveau");
                return response()->json(['statut' => 'saveError', "message"=>"Erreur lors de l'enregistrement! essayer a nouveau!"], 200);
            }           
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->getMessage();
            return response()->json(['statut' => $bug]);
            //return back()->with('error', $bug);
        }

        //return response()->json(['status' => "ok", 'data' => $request->all()]);
    }

    public function pDFFicheVendeur($idVendeur){
        $vendeur = Vendeur::with('places','articles')->find($idVendeur);  //VendeurResource::collection(Vendeur::with('agent','userValidation')->orderBy('id', 'ASC')->get());
        if($vendeur == null){
            toastr()->error("Impossible de traiter cette requête", "Vendeur");
            return back();
        }
        $code_unique =  $vendeur->code_unique ?? 0000;
        $name = $vendeur->nom;
        $postName = $vendeur->postnom;
        $firstName =  $vendeur->prenom;
        $url = url('/');
        $imagePath = public_path('assets/img/logoSogema.png');
        $dataQrcode = "Nom: $name\nPost-nom: $postName\nPrenom: $firstName\nCode_unique: $code_unique\nURL: $url\nMyUrl: $imagePath";
        
        //$base64QrCode = base64_encode($dataQrcode);
        $qrcodeifos = QrCode::size(100)->merge($imagePath,0.3, true)->generate($dataQrcode);
        //return $qrcodeifos;
        return view('pages.vendeurs.pdfFiche', compact('vendeur','qrcodeifos'));
    }

    public function detailsInfosVendeurPourValidation($idVendeur)
    {
        //$vendeur = Vendeur::with('places','articles')->find($idVendeur);
        $vendeur = Vendeur::with('vendeurDemande')->find($idVendeur);
        if($vendeur == null){
            toastr()->error("Impossible de traiter cette requête", "Vendeur");
            return back();
        } 
        //return $vendeur;
        $articles = Article::get();
        $placeNumber =  $this->getPlaceNumber();
        $pavillons = Pavillon::orderBy('numero', "ASC")->get();
        $places = Place::with('TypePlace')->get();
        $emplacements = Emplacement::get();//where('etat', 0)->get();
        //return $places;
        return view('pages.vendeurs.formulaireValidation', compact('vendeur','articles','places','placeNumber','pavillons', 'emplacements'));
    }

    public function detailsInfosVendeurPourValidationStore(Request $request, $idVendeur){
        //return $request->all();

        //valider rejeter
        try {
            if(!empty($request->posseder0) && isset($request->posseder0)){

                if($request->decision0 == "valider"){

                    $posseder0 = Posseder::find($request->posseder0);
                    if($posseder0->decision != "valider" || $posseder0->decision != "rejeter"){
                        if( $posseder0 != null){
                            $posseder0->place_id = $request->place0; 
                            $posseder0->nbr_retenu = $request->quantite0; 
                            $posseder0->maitre_cube_retenu = $request->maitreCube0;  
                            $posseder0->decision = $request->decision0;  
                            $posseder0->userValidateur = Auth()->user()->id;
                            $place0 = Place::find($posseder0->place_id);
                            if( $place0 != null ){
                                if($place0->nbr_restant >= $request->quantite0){
                                    $place0->nbr_restant = $place0->nbr_restant - $request->quantite0;
                                    // if($posseder0->save()){
                                        $posseder0->save();
                                        $place0->save();
                                    // }
                                }elseif($place0->nbr_restant < $request->quantite0){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 1 car la ( Quantié demandé et de $request->quantite0 et Quantité restant et $place0->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision0 == "rejeter"){
                    $posseder0 = Posseder::find($request->posseder0);
                    $posseder0->decision = $request->decision0;  
                    $posseder0->save();
                }
            }   

            if(!empty($request->posseder1) && isset($request->posseder1)){

                if($request->decision1 == "valider"){

                    $posseder1 = Posseder::find($request->posseder1);
                    if($posseder1->decision != "valider" || $posseder1->decision != "rejeter"){
                        if( $posseder1 != null){
                            $posseder1->place_id = $request->place1;
                            $posseder1->nbr_retenu = $request->quantite1;  
                            $posseder1->maitre_cube_retenu = $request->maitreCube1;  
                            $posseder1->decision = $request->decision1;  
                            $posseder1->userValidateur = Auth()->user()->id;
                            $place1 = Place::find($posseder1->place_id);
                            if( $place1 != null ){
                                if($place1->nbr_restant >= $request->quantite1){
                                    $place1->nbr_restant = $place1->nbr_restant - $request->quantite1;
                                    // if($posseder0->save()){
                                        $posseder1->save();
                                        $place1->save();
                                    // }
                                }elseif($place1->nbr_restant < $request->quantite1){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 2 car la ( Quantié demandé et de $request->quantite1 et Quantité restant et $place1->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision1 == "rejeter"){
                    $posseder1 = Posseder::find($request->posseder1);
                    $posseder1->decision = $request->decision1;  
                    $posseder1->save();
                }
            }

            if(!empty($request->posseder2) && isset($request->posseder2)){

                if($request->decision2 == "valider"){

                    $posseder2 = Posseder::find($request->posseder2);
                    if($posseder2->decision != "valider" || $posseder2->decision != "rejeter"){
                        if( $posseder2 != null){
                            $posseder2->place_id = $request->place2;
                            $posseder2->nbr_retenu = $request->quantite2;  
                            $posseder2->maitre_cube_retenu = $request->maitreCube2; 
                            $posseder2->decision = $request->decision2;  
                            $posseder2->userValidateur = Auth()->user()->id;
                            $place2 = Place::find($posseder2->place_id);
                            if( $place2 != null ){
                                if($place2->nbr_restant >= $request->quantite2){
                                    $place2->nbr_restant = $place2->nbr_restant - $request->quantite2;
                                    // if($posseder0->save()){
                                        $posseder2->save();
                                        $place2->save();
                                    // }
                                }elseif($place2->nbr_restant < $request->quantite2){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 3 car la ( Quantié demandé et de $request->quantite2 et Quantité restant et $place2->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision2 == "rejeter"){
                    $posseder2 = Posseder::find($request->posseder2);
                    $posseder2->decision = $request->decision2;  
                    $posseder2->save();
                }
            }

            if(!empty($request->posseder3) && isset($request->posseder3)){

                if($request->decision3 == "valider"){

                    $posseder3 = Posseder::find($request->posseder3);
                    if($posseder3->decision != "valider" || $posseder3->decision != "rejeter"){
                        if( $posseder3 != null){
                            $posseder3->place_id = $request->place3;
                            $posseder3->nbr_retenu = $request->quantite3; 
                            $posseder3->maitre_cube_retenu = $request->maitreCube3;  
                            $posseder3->decision = $request->decision3;  
                            $posseder3->userValidateur = Auth()->user()->id;
                            $place3 = Place::find($posseder3->place_id);
                            if( $place3 != null ){
                                if($place3->nbr_restant >= $request->quantite3){
                                    $place3->nbr_restant = $place3->nbr_restant - $request->quantite3;
                                    // if($posseder0->save()){
                                        $posseder3->save();
                                        $place3->save();
                                    // }
                                }elseif($place3->nbr_restant < $request->quantite3){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 4 car la ( Quantié demandé et de $request->quantite3 et Quantité restant et $place3->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision3 == "rejeter"){
                    $posseder3 = Posseder::find($request->posseder3);
                    $posseder3->decision = $request->decision3;  
                    $posseder3->save();
                }
            }

            if(!empty($request->posseder4) && isset($request->posseder4)){

                if($request->decision4 == "valider"){

                    $posseder4 = Posseder::find($request->posseder4);
                    if($posseder4->decision != "valider" || $posseder4->decision != "rejeter"){
                        if( $posseder4 != null){
                            $posseder4->place_id = $request->place4;
                            $posseder4->nbr_retenu = $request->quantite4; 
                            $posseder4->maitre_cube_retenu = $request->maitreCube4;  
                            $posseder4->decision = $request->decision4;  
                            $posseder4->userValidateur = Auth()->user()->id;
                            $place4 = Place::find($posseder4->place_id);
                            if( $place4 != null ){
                                if($place4->nbr_restant >= $request->quantite4){
                                    $place4->nbr_restant = $place4->nbr_restant - $request->quantite4;
                                    // if($posseder0->save()){
                                        $posseder4->save();
                                        $place4->save();
                                    // }
                                }elseif($place4->nbr_restant < $request->quantite4){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 5 car la ( Quantié demandé et de $request->quantite4 et Quantité restant et $place4->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision4 == "rejeter"){
                    $posseder4 = Posseder::find($request->posseder4);
                    $posseder4->decision = $request->decision4;  
                    $posseder4->save();
                }
            }

            if(!empty($request->posseder5) && isset($request->posseder5)){

                if($request->decision5 == "valider"){

                    $posseder5 = Posseder::find($request->posseder5);
                    if($posseder5->decision != "valider" || $posseder5->decision != "rejeter"){
                        if( $posseder5 != null){
                            $posseder5->place_id = $request->place5;
                            $posseder5->nbr_retenu = $request->quantite5; 
                            $posseder5->maitre_cube_retenu = $request->maitreCube5;  
                            $posseder5->decision = $request->decision5; 
                            $posseder5->userValidateur = Auth()->user()->id; 
                            $place5 = Place::find($posseder5->place_id);
                            if( $place5 != null ){
                                if($place5->nbr_restant >= $request->quantite5){
                                    $place5->nbr_restant = $place5->nbr_restant - $request->quantite5;
                                    // if($posseder0->save()){
                                        $posseder5->save();
                                        $place5->save();
                                    // }
                                }elseif($place5->nbr_restant < $request->quantite5){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 6 car la ( Quantié demandé et de $request->quantite5 et Quantité restant et $place5->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision5 == "rejeter"){
                    $posseder5 = Posseder::find($request->posseder5);
                    $posseder5->decision = $request->decision5;  
                    $posseder5->save();
                }
            }

            if(!empty($request->posseder6) && isset($request->posseder6)){

                if($request->decision6 == "valider"){

                    $posseder6 = Posseder::find($request->posseder6);
                    if($posseder6->decision != "valider" || $posseder6->decision != "rejeter"){
                        if( $posseder6 != null){
                            $posseder6->place_id = $request->place6;
                            $posseder6->nbr_retenu = $request->quantite6;  
                            $posseder6->maitre_cube_retenu = $request->maitreCube6; 
                            $posseder6->decision = $request->decision6;  
                            $posseder6->userValidateur = Auth()->user()->id;
                            $place6 = Place::find($posseder6->place_id);
                            if( $place6 != null ){
                                if($place6->nbr_restant >= $request->quantite6){
                                    $place6->nbr_restant = $place6->nbr_restant - $request->quantite6;
                                    // if($posseder0->save()){
                                        $posseder6->save();
                                        $place6->save();
                                    // }
                                }elseif($place6->nbr_restant < $request->quantite6){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 7 car la ( Quantié demandé et de $request->quantite6 et Quantité restant et $place6->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }                            
                        }
                    }
                }elseif($request->decision6 == "rejeter"){
                    $posseder6 = Posseder::find($request->posseder6);
                    $posseder6->decision = $request->decision6;  
                    $posseder6->save();
                }
            }

            if(!empty($request->posseder7) && isset($request->posseder7)){

                if($request->decision7 == "valider"){

                    $posseder7 = Posseder::find($request->posseder7);
                    if($posseder7->decision != "valider" || $posseder7->decision != "rejeter"){
                        if( $posseder7 != null){
                            $posseder7->place_id = $request->place7;
                            $posseder7->nbr_retenu = $request->quantite7; 
                            $posseder7->maitre_cube_retenu = $request->maitreCube7;  
                            $posseder7->decision = $request->decision7;  
                            $posseder7->userValidateur = Auth()->user()->id;
                            $place7 = Place::find($posseder7->place_id);
                            if( $place7 != null ){
                                if($place7->nbr_restant >= $request->quantite7){
                                    $place7->nbr_restant = $place7->nbr_restant - $request->quantite7;
                                    // if($posseder0->save()){
                                        $posseder7->save();
                                        $place7->save();
                                    // }
                                }elseif($place7->nbr_restant < $request->quantite7){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 8 car la ( Quantié demandé et de $request->quantite7 et Quantité restant et $place7->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision7 == "rejeter"){
                    $posseder7 = Posseder::find($request->posseder7);
                    $posseder7->decision = $request->decision7;  
                    $posseder7->save();
                }
            }

            if(!empty($request->posseder8) && isset($request->posseder8)){

                if($request->decision8 == "valider"){

                    $posseder8 = Posseder::find($request->posseder8);
                    if($posseder8->decision != "valider" || $posseder8->decision != "rejeter"){
                        if( $posseder8 != null){
                            $posseder8->place_id = $request->place8;
                            $posseder8->nbr_retenu = $request->quantite8;  
                            $posseder8->maitre_cube_retenu = $request->maitreCube8; 
                            $posseder8->decision = $request->decision8;  
                            $posseder8->userValidateur = Auth()->user()->id;
                            $place8 = Place::find($posseder8->place_id);
                            if( $place8 != null ){
                                if($place8->nbr_restant >= $request->quantite8){
                                    $place8->nbr_restant = $place8->nbr_restant - $request->quantite8;
                                    // if($posseder0->save()){
                                        $posseder8->save();
                                        $place8->save();
                                    // }
                                }elseif($place8->nbr_restant < $request->quantite8){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 9 car la ( Quantié demandé et de $request->quantite8 et Quantité restant et $place8->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision8 == "rejeter"){
                    $posseder8 = Posseder::find($request->posseder8);
                    $posseder8->decision = $request->decision8;  
                    $posseder8->save();
                }
            }

            if(!empty($request->posseder9) && isset($request->posseder9)){

                if($request->decision9 == "valider"){

                    $posseder9 = Posseder::find($request->posseder9);
                    if($posseder9->decision != "valider" || $posseder9->decision != "rejeter"){
                        if( $posseder9 != null){
                            $posseder9->place_id = $request->place9;
                            $posseder9->nbr_retenu = $request->quantite9;  
                            $posseder9->maitre_cube_retenu = $request->maitreCube9; 
                            $posseder9->decision = $request->decision9;  
                            $posseder9->userValidateur = Auth()->user()->id;
                            $place9 = Place::find($posseder9->place_id);
                            if( $place9 != null ){
                                if($place9->nbr_restant >= $request->quantite9){
                                    $place9->nbr_restant = $place9->nbr_restant - $request->quantite9;
                                    // if($posseder0->save()){
                                        $posseder9->save();
                                        $place9->save();
                                    // }
                                }elseif($place9->nbr_restant < $request->quantite9){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 10 car la ( Quantié demandé et de $request->quantite9 et Quantité restant et $place9->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision9 == "rejeter"){
                    $posseder9 = Posseder::find($request->posseder9);
                    $posseder9->decision = $request->decision9;  
                    $posseder9->save();
                }
            }

            if(!empty($request->posseder10) && isset($request->posseder10)){

                if($request->decision10 == "valider"){

                    $posseder10 = Posseder::find($request->posseder10);
                    if($posseder10->decision != "valider" || $posseder10->decision != "rejeter"){
                        if( $posseder10 != null){
                            $posseder10->place_id = $request->place10;
                            $posseder10->nbr_retenu = $request->quantite10;  
                            $posseder10->maitre_cube_retenu = $request->maitreCube10; 
                            $posseder10->decision = $request->decision10;  
                            $posseder10->userValidateur = Auth()->user()->id;
                            $place10 = Place::find($posseder10->place_id);
                            if( $place10 != null ){
                                if($place10->nbr_restant >= $request->quantite10){
                                    $place10->nbr_restant = $place10->nbr_restant - $request->quantite10;
                                    // if($posseder0->save()){
                                        $posseder10->save();
                                        $place10->save();
                                    // }
                                }elseif($place10->nbr_restant < $request->quantite10){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 11 car la ( Quantié demandé et de $request->quantite10 et Quantité restant et $place10->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision10 == "rejeter"){
                    $posseder10 = Posseder::find($request->posseder10);
                    $posseder10->decision = $request->decision10;  
                    $posseder10->save();
                }
            }

            if(!empty($request->posseder11) && isset($request->posseder11)){

                if($request->decision11 == "valider"){

                    $posseder11 = Posseder::find($request->posseder11);
                    if($posseder11->decision != "valider" || $posseder11->decision != "rejeter"){
                        if( $posseder11 != null){
                            $posseder11->place_id = $request->place11;
                            $posseder11->nbr_retenu = $request->quantite11;  
                            $posseder11->maitre_cube_retenu = $request->maitreCube11; 
                            $posseder11->decision = $request->decision11; 
                            $posseder11->userValidateur = Auth()->user()->id; 
                            $place11 = Place::find($posseder11->place_id);
                            if( $place11 != null ){
                                if($place11->nbr_restant >= $request->quantite11){
                                    $place11->nbr_restant = $place11->nbr_restant - $request->quantite11;
                                    // if($posseder0->save()){
                                        $posseder11->save();
                                        $place11->save();
                                    // }
                                }elseif($place11->nbr_restant < $request->quantite11){
                                    toastr()->error("Impossible de traiter cette requête de la ligne 12 car la ( Quantié demandé et de $request->quantite11 et Quantité restant et $place11->nbr_restant )", "Vendeur");
                                    return back();
                                }
                            }
                            
                        }
                    }
                }elseif($request->decision11 == "rejeter"){
                    $posseder11 = Posseder::find($request->posseder11);
                    $posseder11->decision = $request->decision11;  
                    $posseder11->save();
                }
            }
            
            $vendeur = Vendeur::find($idVendeur);
            if($vendeur == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            }
            $vendeur->etat = "traiter";
            $vendeur->save();
            toastr()->success('Enregistrement effectué avec success!');
            return back()->with('success', "Enregistrement effectué avec success!");
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->getMessage();
            toastr()->error($bug, "Vendeur");
            return back()->with('error', $bug);
            //return back()->with('error', $bug);
        }
        
    }

    public function listVendeurParEtat(Request $request, $etat){
        
        if($request->ajax()) {
            // attente traiter
            $vendeurs = VendeurResource::collection(Vendeur::where('etat', $etat)->orderBy('id', 'ASC')->get());
            //$vendeurs = Vendeur::where('etat', 'traiter')->orderBy('id', 'ASC')->get();
            return view('pages.vendeurs.listeDonnees', compact('vendeurs'));            
            //return response()->json(['statut'=>"dataExiste", 'myData'=> $vendeurs], 200);
        }
        $vendeurCounts = Vendeur::where('etat', $etat)->count();
        return view('pages.vendeurs.listeVendeurEtat', compact('etat','vendeurCounts'));
    }

    public function searchVendeurForm(){
        return view('pages.vendeurs.searchVendeur');
    }

    public function searchVendeurStore(Request $request){
        $validator = $request->validate([
            'searchForm' => 'required',
        ]); 
        $rq = $request->searchForm;        
        //$vendeur = Vendeur::where('code_unique', $rq)->where('etat', 'traiter')->first(); 
        $vendeur = Vendeur::where('code_unique', $rq)->first();  

        //return $vendeur;
        if($vendeur == null)
        {
            $vendeur = "";
            toastr()->error('introuvable code unique vendeur!','error');
            return view('pages.vendeurs.searchVendeur', compact('vendeur'));
        }      
        return view('pages.vendeurs.searchVendeur', compact('vendeur'));
    }

    public function vendeurUpdateBanque(Request $request, $idVendeur){
        $validator = $request->validate([
            'numCompte' => 'required',
        ]); 
        $vendeur = Vendeur::find($idVendeur);  
        
        if($vendeur == null)
        {
            //$vendeur = "";
            toastr()->error('introuvable code unique vendeur!','error');
            //return view('pages.vendeurs.searchVendeur', compact('vendeur'));
            return back();
        }
        $vendeur->numCompteBancaire = $request->numCompte;
        $vendeur->etat = 'payer';
        $vendeur->agentBanque = Auth::user()->id;
        $vendeur->save();
        toastr()->success('Numéro compte bancaire ajouté avec succés');
        return back();
    }
}
