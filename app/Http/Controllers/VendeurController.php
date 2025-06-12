<?php

namespace App\Http\Controllers;

use PDF;
use Str;
use toastr;
use App\Models\Place;
use App\Models\Article;
use App\Models\Vendeur;
use Infobip\Api\SmsApi;
use App\Models\Empreint;
use App\Models\Pavillon;
use App\Models\Posseder;
use App\Models\Concerner;
use Infobip\Configuration;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use App\Models\VendeurDemande;
use App\Profondeur\Profondeur;
use Infobip\Model\SmsDestination;
// use App\Http\Controllers\Treatement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Treatement;

use Illuminate\Support\Facades\Auth;
use Infobip\Model\SmsTextualMessage;
use App\Http\Resources\VendeurResource;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Infobip\Model\SmsAdvancedTextualRequest;
//use Illuminate\Support\Carbon;
use Carbon\Carbon;

class VendeurController extends Controller
{
    public function index(Request $request){
        //return Vendeur::with('agent','userValidation','places','articles')->orderBy('id', 'ASC')->get();
       // return VendeurResource::collection(Vendeur::with('agent','userValidation')->orderBy('id', 'ASC')->get());
        if($request->ajax()) {
            $vendeurs = VendeurResource::collection(Vendeur::with('agent','userValidation')->orderBy('id', 'DESC')->get());
            return view('pages.vendeurs.listeAllDonnees', compact('vendeurs'));            
            //return response()->json(['statut'=>"dataExiste", 'myData'=> $vendeurs], 200);
        }
        //return $placeNumber =  $this->getPlaceNumber();
        $placeNumber =  $this->getPlaceNumber();
        $vendeurs = [];
        $vendeurCounts = Vendeur::count();
        return view('pages.vendeurs.listeAll', compact('vendeurs','placeNumber','vendeurCounts'));
    }

    public function selectChoixSave()
    {
        return view('pages.vendeurs.selectChoixSave');
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
            //$vend->datecreation = date('Y-m-d'); //$request->datecreation;
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
            //'email' => 'email',
        ]);

        if ($validator->fails()) {
            return response()->json(['statut'=> 'errorValidate', 'errorsValidateMessage' => $validator->errors()]);
        }

        //return response()->json(['statut' => 'saveSuccess', "message"=>$request->all()]);
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
            if(!empty($request->etat)){
                $vend->etat = $request->etat;
            }            

            $vend->agent_id = Auth::user()->id;
            $vend->email = $request->email;
            //$vend->datecreation = date('Y-m-d H:i:s'); //$request->datecreation;
            //$vend->nom_chef_pavillon = $request->nom_chef_pavillon;        
            $vend->piece_identite = $request->piece_identite;
            $vend->piece_identite_date_expiration = $request->piece_identite_date_expiration;
            //$vend->personne_de_reference = $request->personne_de_reference;
            if(!empty($request->rccm_patente)){
                $vend->rccm_patente =  $request->rccm_patente;
                if($request->rccm_patente == "rccm") { $vend->rccm = $request->rccm; }
                if($request->rccm_patente == "patente") { $vend->numero_patente = $request->rccm; }
            }
            $vend->numero_national =  $request->numero_national;
            $vend->ancien_nouveau =  $request->statut;
            
            // $filename = '';
            // if ($request->hasfile('uploadImg')) {
            //     $extension = request('uploadImg')->getClientOriginalExtension();
            //     $file_title = Treatement::slug_title($request->nom) . '_' . time() . '.' . $extension;
            //     $filename = $request->uploadImg->storeAs('avatars', $file_title);
            // }
            // $vend->photo = $filename;

            $imageName = $request->nom . ucfirst($request->prenom) ."_" . time() . '_'. date('Y'); // . '.png' $detenu->nom;
           
            //save image 1
            $imageData = $request->image_data;
            if(!empty($imageData))
            {
                // Vérifier que le format de l'image est bien conforme (commence par "data:image/")
                if (strpos($imageData, 'data:image/') !== 0) {
                    return response()->json(['success' => false, 'message' => 'Format de l\'image non valide.'], 400);
                }

                // Supprimer le préfixe "data:image/png;base64," ou similaire de l'image
                $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $imageData);
                $imageData = str_replace(' ', '+', $imageData);

                // Décoder les données base64 en contenu binaire
                $image = base64_decode($imageData);
                if ($image === false) {
                    return response()->json(['success' => false, 'message' => 'Échec du décodage de l\'image.'], 400);
                }

                $filename = '';
                //$extension = request('uploadImg')->getClientOriginalExtension();
                $file_title = Treatement::slug_title($imageName) . '_' . time() .'.png';
                $path = "uploaded_files/" . 'avatars/' . $file_title;    
                //$filename = Storage::disk('public')->put($path . $file_title, $image);
                $filename = file_put_contents($path, $image);
                $vend->photo = 'avatars/' .$file_title;
            }                                

            if ($request->hasfile('getPhotoMyPc')) {
                $extension = request('getPhotoMyPc')->getClientOriginalExtension();
                $file_title = Treatement::slug_title($imageName) . '_' . time() . '.' . $extension;
                $filename = $request->getPhotoMyPc->storeAs('avatars', $file_title);

                $vend->photo = $filename;
            }
            // End image 1
            
            $vend->save();

            $enpreint = new Empreint();
            $enpreint->doigt_droite1 = $request->doigt_droite1_input;
            $enpreint->doigt_droite2 = $request->doigt_droite2_input;
            $enpreint->doigt_droite3 = $request->doigt_droite3_input;
            $enpreint->doigt_droite4 = $request->doigt_droite4_input;
            $enpreint->doigt_droite5 = $request->doigt_droite5_input;
            
            $enpreint->doigt_gauche1 = $request->doigt_gauche1_input;
            $enpreint->doigt_gauche2 = $request->doigt_gauche2_input;
            $enpreint->doigt_gauche3 = $request->doigt_gauche3_input;
            $enpreint->doigt_gauche4 = $request->doigt_gauche4_input;
            $enpreint->doigt_gauche5 = $request->doigt_gauche5_input;
            $enpreint->vendeur_id = $vend->id;
            $enpreint->save_by_id = Auth::user()->id;
            $enpreint->save();

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

    public function edit($idVendeur)
    {
        try {
            //,'vendeurDemande.emplacement','vendeurDemande.pavillon'
            $vendeur = Vendeur::with('vendeurDemande')->find($idVendeur);
            if($vendeur == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            } 
            //return $vendeur;
            return view('pages.vendeurs.edit', compact('vendeur'));
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->getMessage();
            toastr()->error($bug, "Vendeur");
            return back()->with('error', $bug);
            //return back()->with('error', $bug);
        }
    }

    public function editIdentiteUpdate(Request $request, $idVendeur)
    {
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
            'email' => 'required|email',
        ]);

        try {
            //,'vendeurDemande.emplacement','vendeurDemande.pavillon'
            $vend = Vendeur::with('vendeurDemande')->find($idVendeur);
            if($vend == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            } 
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
            $vend->email = $request->email;
            //$vend->datecreation = date('Y-m-d H:i:s'); //$request->datecreation;
            //$vend->nom_chef_pavillon = $request->nom_chef_pavillon;        
            $vend->piece_identite = $request->piece_identite;
            $vend->piece_identite_date_expiration = $request->piece_identite_date_expiration;
            //$vend->personne_de_reference = $request->personne_de_reference;
            if(!empty($request->rccm_patente)){
                $vend->rccm_patente =  $request->rccm_patente;
                if($request->rccm_patente == "rccm") { $vend->rccm = $request->rccm; }
                if($request->rccm_patente == "patente") { $vend->numero_patente = $request->rccm; }
            }
            $vend->numero_national =  $request->numero_national;
            //$vend->ancien_nouveau =  $request->statut;
            $vend->save();
            //return $request->all();//view('pages.vendeurs.edit', compact('vendeur'));
            $myUrl = "{{redirect()->route('vend.fichePDF', $vend->id)}}";
            return response()->json(['statut' => 'saveSuccess', "message"=>"Modification effectué avec success!", "myData"=> $vend->id, "myUrl" => $myUrl], 200);
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->getMessage();
            toastr()->error($bug, "Vendeur");
            return back()->with('error', $bug);
            //return back()->with('error', $bug);
        }
    }

    public function pDFFicheVendeur($idVendeur){
        $vendeur = Vendeur::find($idVendeur);  //VendeurResource::collection(Vendeur::with('agent','userValidation')->orderBy('id', 'ASC')->get());
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
        $dataQrcode = "Nom: $name\nPost-nom: $postName\nPrenom: $firstName\nCode_unique: $code_unique\nURL: $url\n";
        
        //$base64QrCode = base64_encode($dataQrcode);
        $qrcodeifos = QrCode::size(100)->merge($imagePath,0.3, true)->generate($dataQrcode);
        //return $qrcodeifos;
        return view('pages.vendeurs.pdfFiche', compact('vendeur','qrcodeifos'));
    }

    public function detailsInfosVendeurPourValidation($idVendeur)
    {
        //$vendeur = Vendeur::with('places','articles')->find($idVendeur);
        $vendeur = Vendeur::with('vendeurDemande','vendeurDemande.emplacement','vendeurDemande.pavillon')->find($idVendeur);
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
        try {
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

    public function vendeurTraiter($idVendeur){
        try {

            $vendeur = Vendeur::find($idVendeur);
            if($vendeur == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            }
            $vendeur->etat = "traiter";
            $vendeur->date_traitement = date('Y-m-d H:i:s');
            $vendeur->userTraiter_id = Auth::user()->id;     
            $vendeur->save();
            toastr()->success('Enregistrement effectué avec success!');
            return redirect()->route("vend.listVendeurParEtat","attente"); //back(); //->with('success', "Enregistrement effectué avec success!");
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->getMessage();
            toastr()->error($bug, "Vendeur");
            return back()->with('error', $bug);
            //return back()->with('error', $bug);
        }
    }

    public function detailsVendeurValidationDG($idVendeur){
        if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "DG"){
            $vendeur = Vendeur::with('vendeurDemande','vendeurDemande.emplacement','vendeurDemande.pavillon')->find($idVendeur);
            if($vendeur == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            } 

            $totalSum = VendeurDemande::where('vendeur_id', $idVendeur)->where('decision','1')->whereNotNull(['article_id','pavillon_id','place_id','emplacement_id'])->sum('total');
            
            $totalRemiseSum = VendeurDemande::where('vendeur_id', $idVendeur)->where('decision','1')->where('remise', '>', '0')->whereNotNull(['article_id','pavillon_id','place_id','emplacement_id'])->get(); //sum('total');
            
            $totalNoSum = VendeurDemande::where('vendeur_id', $idVendeur)->where('decision','1')->where('remise', '0')->whereNotNull(['article_id','pavillon_id','place_id','emplacement_id'])->sum('total');
            
            $totalRemiseSommes = 0; // = [];
            foreach($totalRemiseSum as $rm){
                $myRemise = $rm->total * $rm->remise / 100; 
                $totalApayer = $rm->total - $myRemise;
                $totalRemiseSommes += $totalApayer;
            }

            $totalApayerRemise = $totalRemiseSommes + $totalNoSum;
            
            $code_unique =  $vendeur->code_unique ?? 0000;
            $name = $vendeur->nom;
            $postName = $vendeur->postnom;
            $firstName = $vendeur->prenom;
            $url = 'https://example.com';
            $imagePath = public_path('assets/img/logoSogema.png');
            $dataQrcode = "Nom: $name\nPost-nom: $postName\nPrenom: $firstName\nCode_unique: $code_unique\nURL: $url\nMyUrl: $imagePath";
            
            //$base64QrCode = base64_encode($dataQrcode);
            $qrcodeifos = QrCode::size(100)->merge($imagePath,0.3, true)->generate($dataQrcode);
            //return $totalApayerRemise;
            return view('pages.vendeurs.formulaireValidationDG', compact('vendeur','qrcodeifos','totalSum','totalApayerRemise'));
        }else{
            toastr()->error("Impossible de faire l'opération", "Vendeur");
            return back();
        }
    }

    public function listVendeurParEtat(Request $request, $etat)
    {
        // attente traiter valider payer
        if($request->ajax()) {
            $vendeurs = VendeurResource::collection(Vendeur::where('etat', $etat)->orderBy('id', 'DESC')->get());
            // return view('pages.vendeurs.listeDonnees', compact('vendeurs'));            
            return view('pages.vendeurs.listeAllDonnees', compact('vendeurs'));            
        }

        $vendeurCounts = Vendeur::where('etat', $etat)->count();
        
        return view('pages.vendeurs.listeVendeurEtat', compact('etat','vendeurCounts'));
    }

    public function searchVendeurForm(){
        return view('pages.vendeurs.searchVendeurBanque');
    }

    public function searchVendeurStore(Request $request){
        $validator = $request->validate([
            'searchForm' => 'required',
        ]);
        $rq = $request->searchForm;        
        //$vendeur = Vendeur::where('code_unique', $rq)->where('etat', 'traiter')->first(); 
        $vendeur = Vendeur::with('vendeurDemande')->where('code_unique', $rq)
                    //->where('decision_dg', 1)
                    //->where('etat','valider')
                    // ->orWhere('etat', 'payer')
                    ->first();          
        
        //return $vendeur->id;
        if($vendeur == null)
        {
            $vendeur = "Sogema";
            toastr()->error('introuvable code unique vendeur!','error');
            return back();
            //return view('pages.vendeurs.searchVendeurBanque', compact('vendeur'));
            //return view('pages.vendeurs.formulaireValidationBanque', compact('vendeur'));
        }
        $code_unique =  $vendeur->code_unique ?? 0000;
        $name = $vendeur->nom;
        $postName = $vendeur->postnom;
        $firstName = $vendeur->prenom;
        $url = url('/');
        $imagePath = public_path('assets/img/logoSogema.png');
        $dataQrcode = "Nom: $name\nPost-nom: $postName\nPrenom: $firstName\nCode_unique: $code_unique\nURL: $url\nMyUrl: $imagePath";
        $qrcodeifos = QrCode::size(100)->merge($imagePath,0.3, true)->generate($dataQrcode);

        $totalApayerRemise = $this->totalApayer($vendeur->id);
        //return view('pages.vendeurs.searchVendeurBanque', compact('vendeur'));
        return view('pages.vendeurs.formulaireValidationBanque', compact('vendeur','totalApayerRemise','qrcodeifos'));
    }

    public function totalApayer($idVendeur){
        $totalRemiseSum = VendeurDemande::where('vendeur_id', $idVendeur)->where('decision','1')->where('remise', '>', '0')->whereNotNull(['article_id','pavillon_id','place_id','emplacement_id'])->get(); //sum('total');
            
        $totalNoSum = VendeurDemande::where('vendeur_id', $idVendeur)->where('decision','1')->where('remise', '0')->whereNotNull(['article_id','pavillon_id','place_id','emplacement_id'])->sum('total');
        
        $totalRemiseSommes = 0; // = [];
        foreach($totalRemiseSum as $rm){
            $myRemise = $rm->total * $rm->remise / 100; 
            $totalApayer = $rm->total - $myRemise;
            $totalRemiseSommes += $totalApayer;
        }

        return $totalApayerRemise = $totalRemiseSommes + $totalNoSum;
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

    public function saveRemise(Request $request) {
        try {
            $idVendeurDemande = $request->idVendeurDemande;
            $remise = $request->remise;

            $vd = VendeurDemande::find($idVendeurDemande);

            if($vd == null){
                //toastr()->error("Impossible de traiter cette requête", "Vendeur");
                //return back();
                return response()->json(['message' => "Impossible de traiter cette requête"]);
            }

            $vd->remise = $request->remise ?? 0;
            $vd->save();
           
            $totalRemiseSum = VendeurDemande::where('vendeur_id', $vd->vendeur_id)->where('decision','1')->where('remise', '>', '0')->whereNotNull(['article_id','pavillon_id','place_id','emplacement_id'])->get(); //sum('total');
        
            $totalNoSum = VendeurDemande::where('vendeur_id', $vd->vendeur_id)->where('decision','1')->where('remise', '0')->whereNotNull(['article_id','pavillon_id','place_id','emplacement_id'])->sum('total');
        
            $totalRemiseSommes = 0; // = [];
            foreach($totalRemiseSum as $rm){
                $myRemise = $rm->total * $rm->remise / 100; 
                $totalApayer = $rm->total - $myRemise;
                $totalRemiseSommes += $totalApayer;
            }
            $totalApayerRemise = $totalRemiseSommes + $totalNoSum;
            
            return response()->json(['statut' => "success", "myData" =>  $totalApayerRemise]); //$request->all();
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return response()->json(['error', $bug]);
            //return back()->with('error', $bug);
        }
    }

    public function terminerDg($idVendeur){
        try {
            $vd = Vendeur::find($idVendeur);
            //return substr($vd->telephone, -9); //$vd->telephone;
            if($vd == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
                //return response()->json(['message' => "Impossible de traiter cette requête"]);
            }

            $vd->decision_dg = 1;
            $vd->etat = "valider";
            $vd->save();

            $configuration = new Configuration(
                host: '6gyw88.api.infobip.com',
                apiKey: 'e72925edfcbe8b9f04b3f12496a8b357-bdc6163f-325f-4a18-9526-e2c475415af3'
            );

            $sendSmsApi = new SmsApi(config: $configuration);

            $message = new SmsTextualMessage(
                destinations: [
                    new SmsDestination(to: "243".substr($vd->telephone, -9)) //.substr($vd->telephone, -9) ."820939428"
                ],
                from: 'SOGEMA CONFIRMATION DE VALIDATION DOSSIER',
                text: "Bonjour Mr/Mme $vd->nom $vd->prenom\nNous vous confirmons que votre dossier vient d'être validé par le Directeur Général de SOGEMA.\nVous disposez de 30 jours, à compter d'aujourd'hui, pour effectuer le paiement à la banque avec le code secret\n $vd->code_unique\n Passé ce délai, votre demande sera annulée."
            );

            $request = new SmsAdvancedTextualRequest(messages: [$message]);
            $smsResponse = $sendSmsApi->sendSmsMessage($request);
            //return substr($vd->telephone, -9);
            toastr()->success("Opération terminé avec succès", "Vendeur");
            return back();
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return response()->json(['error', $bug]);
            toastr()->error($bug);
            return back()->with('error', $bug);
        }
    }

    public function saveDecisionBanque(Request $request)
    {
        //return Auth::user();
        $validator = Validator::make($request->all(), [
            'idVendeurDemande' => 'required',
            //'nom_agent' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['statut'=> 'errorValidate', 'errorsValidateMessage' => $validator->errors()]);
        }

        try{

            for($i=0; $i < count($request->idVendeurDemande); $i++)
            {
                $vd = VendeurDemande::find($request->idVendeurDemande[$i]);
                $vd->decision_banque = '1';
                $vd->date_decision_banque = date('Y-m-d H:i:s');
                $vd->nom_agent_banque = Auth::user()->id ?? "Inconnu";   //Auth::user()->fullname() ?? "Inconnu";
                $vd->save();
            }
            $vendeur = VendeurDemande::find($request->idVendeurDemande['0']);
            if($vendeur == null){
                response()->json(['statut' => 'errorValidate', 'errorsValidateMessage' => "Impossible de traiter cette requête! demande vendeur introuvable"]);
            }

            if(!empty($vd->vendeur_id) && $vd->vendeur_id > 0){
                $vendeur = Vendeur::find($vd->vendeur_id);
                if($vendeur == null)
                {
                    response()->json(['statut' => 'errorValidate', 'errorsValidateMessage' => "Impossible de traiter cette requête! vendeur introuvable"]);
                }
                $vendeur->etat = "payer";
                $vendeur->date_paiment = date('Y-m-d H:i:s');
                $vendeur->save();
            }
            
            // $vd->decision_banque = '1';
            // $vd->date_decision_banque = date('Y-m-d H:i:s');
            // $vd->nom_agent_banque = Auth::user()->fullname() ?? "Inconnu"; //$request->nom_agent ?? "Inconnu";
            // if($vd->save()){
            //     return response()->json(['statut' => 'saveOk', 'reponse' => $request->all()]);
            // }else{
            //     return response()->json(['statut' => 'errorValidate', 'errorMessage' => "Erreur lors de l'enregistrement"]);
            // } 
            return response()->json(['statut' => 'saveSuccess', 'message' => "Enregistrement effectué avec succés"]);          
        }catch (\Exception $e) {
            // DB::rollback();
            $bug = $e->getMessage();
            return response()->json(['status' => "errorValidate", 'errorMessage' => $bug]);
            //return back()->with('error', $bug);
         }
    }

    public function saveDecisionBanqueM(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idVendeurDemande' => 'required',
            //'nom_agent' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['statut'=> 'errorValidate', 'errorsValidateMessage' => $validator->errors()]);
        }

        try{
            $vd = VendeurDemande::find($request->idVendeurDemande);
            if($vd == null){
                response()->json(['statut' => 'errorValidate', 'errorsValidateMessage' => "Impossible de traiter cette requête! demande vendeur introuvable"]);
            }

            if(!empty($vd->vendeur_id) && $vd->vendeur_id > 0){
                $vendeur = Vendeur::find($vd->vendeur_id);
                if($vendeur == null)
                {
                    response()->json(['statut' => 'errorValidate', 'errorsValidateMessage' => "Impossible de traiter cette requête! vendeur introuvable"]);
                }
                $vendeur->etat = "payer";
                $vendeur->date_paiment = date('Y-m-d H:i:s');
                $vendeur->save();
            }
            
            $vd->decision_banque = '1';
            $vd->date_decision_banque = date('Y-m-d H:i:s');
            $vd->nom_agent_banque = $request->nom_agent ?? "Inconnu";
            if($vd->save()){
                return response()->json(['statut' => 'saveOk', 'reponse' => $request->all()]);
            }else{
                return response()->json(['statut' => 'errorValidate', 'errorMessage' => "Erreur lors de l'enregistrement"]);
            }            
        }catch (\Exception $e) {
            // DB::rollback();
             $bug = $e->getMessage();
             //return response()->json(['status' => $bug]);
             return back()->with('error', $bug);
         }
    }

    public function vendeurContrat(Request $request, $idVendeur)
    {
        try {
            //emplacements.numero as emplacementNumero ,'emplacements.numero' emplacements.id as emplacementId,
            // vendeur_demandes.id as vendeurDemandeId,
            $vendeur = Vendeur::find($idVendeur);

            // $vendeurDemande = DB::table('vendeur_demandes')
            //             ->join('vendeurs', 'vendeurs.id', '=', 'vendeur_demandes.vendeur_id')
            //             ->join('places', 'places.id', '=', 'vendeur_demandes.place_id')
            //             ->join('articles', 'articles.id', '=', 'vendeur_demandes.article_id')
            //             ->join('emplacements', 'emplacements.id', '=', 'vendeur_demandes.emplacement_id')
            //             ->join('type_places', 'type_places.id', '=', 'places.type_place_id')
            //             ->selectRaw("
            //                 type_places.dimension as typeDimension,
            //                 vendeur_demandes.article_id as article_id,
            //                 vendeur_demandes.prix as prix_par_mois,
            //                 places.id as place_id,
            //                 places.nom as placeNom,
            //                 count(places.id) as placeNumber,
            //                 articles.nom as articleNom,                            
            //                 GROUP_CONCAT(emplacements.numero ORDER BY emplacements.numero ASC SEPARATOR ',') as emplacementNumeros
            //             ")
            //             ->where('vendeur_demandes.vendeur_id', '=', $idVendeur)
            //             ->where('vendeur_demandes.decision_banque', '=', "1")
            //             ->where('vendeur_demandes.decision', '=', "1")
            //             ->whereNotNull('vendeur_demandes.emplacement_id')
            //             ->whereNotNull('vendeur_demandes.place_id')
            //             ->groupBy('places.id','type_places.dimension','places.nom','articles.nom','vendeur_demandes.article_id','vendeur_demandes.prix')
            //             ->get(); 

            //vendeur_demandes.article_id as article_id, vendeur_demandes.prix as prix_par_mois,  places.id as place_id, articles.nom as articleNom, 
            
            $vendeurDemande = DB::table('vendeur_demandes')
                        ->join('vendeurs', 'vendeurs.id', '=', 'vendeur_demandes.vendeur_id')
                        ->join('places', 'places.id', '=', 'vendeur_demandes.place_id')
                        ->join('articles', 'articles.id', '=', 'vendeur_demandes.article_id')
                        ->join('emplacements', 'emplacements.id', '=', 'vendeur_demandes.emplacement_id')
                        ->join('type_places', 'type_places.id', '=', 'places.type_place_id')
                        ->selectRaw("
                            GROUP_CONCAT(DISTINCT places.nom) as placeNom,
                            GROUP_CONCAT(DISTINCT type_places.nom) as placeType,
                            count(places.id) as placeNumber,                                                   
                            GROUP_CONCAT(emplacements.numero ORDER BY emplacements.numero ASC SEPARATOR ',') as emplacementNumeros
                        ")
                        ->where('vendeur_demandes.vendeur_id', '=', $idVendeur)
                        ->where('vendeur_demandes.decision_banque', '=', "1")
                        ->where('vendeur_demandes.decision', '=', "1")
                        ->where('vendeurs.etat', '=', "payer")
                        ->whereNotNull('vendeur_demandes.emplacement_id')
                        ->whereNotNull('vendeur_demandes.place_id')
                        //->groupBy('places.nom')
                        ->groupBy('places.nom', 'type_places.nom')
                        ->groupBy()
                        ->get(); 
    
            // $vendeurTransforme = $vendeur->map(function ($item) {
            //     $item->emplacementNumeros = explode(',', $item->emplacementNumeros);
            //     return $item;
            // });
            return view('pages.vendeurs.contratParPlace', compact('vendeur','vendeurDemande')); 
            return $vendeurDemande;
            $urlPath = public_path('assets');
            $pdf = PDF::loadView('pages.vendeurs.contrat', compact('vendeur','vendeurDemande','urlPath')); 
            $nameContrat = "contrat_de_".$vendeur->nom.date('d_m_Y').'.pdf';   
            return $pdf->stream($nameContrat);
            //return view('pages.vendeurs.contrat', compact('vendeur','vendeurDemande','urlPath'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function contratImprimer(Request $request)
    {
        try{ //return $request->placeType;
            $vendeur = Vendeur::find($request->vendeurId);
            $qrcode = $this->qrCode($vendeur);
            // $vendeurDemande = DB::table('vendeur_demandes')
            //                 ->join('vendeurs', 'vendeurs.id', '=', 'vendeur_demandes.vendeur_id')
            //                 ->join('places', 'places.id', '=', 'vendeur_demandes.place_id')
            //                 ->join('articles', 'articles.id', '=', 'vendeur_demandes.article_id')
            //                 ->join('emplacements', 'emplacements.id', '=', 'vendeur_demandes.emplacement_id')
            //                 ->join('type_places', 'type_places.id', '=', 'places.type_place_id')
            //                 ->join('pavillons', 'pavillons.id', '=', 'vendeur_demandes.pavillon_id')
            //                 ->selectRaw("
            //                     type_places.dimension as typeDimension,
            //                     GROUP_CONCAT(pavillons.numero) as pavillonNumero,
            //                     GROUP_CONCAT(pavillons.niveau) as pavillonNiveau,
            //                     count(places.id) as placeNumber,                                                   
            //                     GROUP_CONCAT(emplacements.numero ORDER BY emplacements.numero ASC SEPARATOR ',') as emplacementNumeros
            //                 ")
            //                 ->where('vendeur_demandes.vendeur_id', '=', $request->vendeurId)
            //                 ->where('places.nom', 'LIKE', '%' . $request->placeName .'%')
            //                 ->where('vendeur_demandes.decision_banque', '=', "1")
            //                 ->where('vendeur_demandes.decision', '=', "1")
            //                 ->whereNotNull('vendeur_demandes.emplacement_id')
            //                 ->whereNotNull('vendeur_demandes.place_id')
            //                 ->groupBy('type_places.dimension')
            //                 ->get();

            $vendeurDemande = DB::table('vendeur_demandes')
                            ->join('vendeurs', 'vendeurs.id', '=', 'vendeur_demandes.vendeur_id')
                            ->join('places', 'places.id', '=', 'vendeur_demandes.place_id')
                            ->join('articles', 'articles.id', '=', 'vendeur_demandes.article_id')
                            ->join('emplacements', 'emplacements.id', '=', 'vendeur_demandes.emplacement_id')
                            ->join('type_places', 'type_places.id', '=', 'places.type_place_id')
                            ->join('pavillons', 'pavillons.id', '=', 'vendeur_demandes.pavillon_id')
                            ->selectRaw("
                                GROUP_CONCAT(DISTINCT type_places.dimension) as typeDimension,
                                GROUP_CONCAT(pavillons.numero) as pavillonNumero,
                                GROUP_CONCAT(pavillons.niveau) as pavillonNiveau,
                                count(places.id) as placeNumber,                                                   
                                GROUP_CONCAT(emplacements.numero ORDER BY emplacements.numero ASC SEPARATOR ',') as emplacementNumeros
                            ")
                            ->where('vendeur_demandes.vendeur_id', '=', $request->vendeurId)
                            //->where('places.nom', 'LIKE', '%' . $request->placeName .'%')
                            ->where('places.nom', "=", $request->placeName)
                            ->where('type_places.nom', "=", $request->placeType)
                            ->where('vendeur_demandes.decision_banque', '=', "1")
                            ->where('vendeur_demandes.decision', '=', "1")
                            ->whereNotNull('vendeur_demandes.emplacement_id')
                            ->whereNotNull('vendeur_demandes.place_id')
                            //->groupBy('type_places.dimension') //, 'type_places.nom'
                            ->groupBy('places.nom')
                            ->get();                          
            
            $urlPath = public_path('assets');
            $placeType = $request->placeType;
            $nameContrat = "contrat_de_".$vendeur->nom.date('d_m_Y').'.pdf'; 
            //return $vendeurDemande;
            if($request->placeName == "Magasin")
            {
                $pdf = PDF::loadView('pages.vendeurs.contratMagasin', compact('vendeur','vendeurDemande','urlPath','placeType','qrcode')); 
                return $pdf->stream($nameContrat);
            }

            if($request->placeName == "Etalage")
            {
                $pdf = PDF::loadView('pages.vendeurs.contratEtalage', compact('vendeur','vendeurDemande','urlPath','qrcode')); 
                //return $qrcode;
                return $pdf->stream($nameContrat);
            }

            if($request->placeName == "Kiosque")
            {
                $pdf = PDF::loadView('pages.vendeurs.contrat', compact('vendeur','vendeurDemande','urlPath','qrcode')); 
                return $pdf->stream($nameContrat);
            }

            if($request->placeName == "Entrepôt")
            {
                $pdf = PDF::loadView('pages.vendeurs.contratEntrepot', compact('vendeur','vendeurDemande','urlPath','qrcode')); 
                return $pdf->stream($nameContrat);
            }

            if($request->placeName == "Chambre froide")
            {
                $pdf = PDF::loadView('pages.vendeurs.contrat', compact('vendeur','vendeurDemande','urlPath','qrcode')); 
                return $pdf->stream($nameContrat);
            }
            $placeNames = $request->placeName;
            return view('pages.vendeurs.contratNonTrouver', compact('placeNames','qrcode'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function qrCode($vendeur)
    {
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
        $dataQrcode = "Nom: $name\nPost-nom: $postName\nPrenom: $firstName\nCode_unique: $code_unique\nURL: $url\n";
        //$qrcodeifos = QrCode::size(100)->merge($imagePath,0.3, true)->generate($dataQrcode);
        $qrcodeifos = QrCode::size(100)->generate($dataQrcode);
        return base64_encode($qrcodeifos);
    }

    public function searchAllByDate(Request $request)
    {
        $dateRechercheDebut = $request->getDateDebutValue;; // $request->getDateValue; //'2024-08-22'; 
        $dateRechercheDFin = $request->getDateFinValue; // $request->getDateValue; //'2024-08-22'; 
        //$vendeurs = Vendeur::where('created_at', 'LIKE', '%'. $request->getDateValue)->orderBy('nom', 'ASC')->get();
        //$vendeurs = Vendeur::whereDate('datecreation', $dateRecherche)->orderBy('nom', 'ASC')->get();
        //return $request->all();
        $vendeurs = Vendeur::whereBetween('datecreation', [$dateRechercheDebut, $dateRechercheDFin])->orderBy('nom', 'ASC')->get();
        return view('pages.vendeurs.listeAllDonnees', compact('vendeurs'));
    }

    public function searchAllByName(Request $request)
    {
        $query = $request->input('myInputRecherche');
        // Vérifie si une valeur de recherche a été entrée
        if ($query) {
            // Divise l'entrée en plusieurs termes (par exemple, si "nom prenom" est entré)
            $searchTerms = explode(' ', $query);

            // Démarre la requête de recherche
            $vendeurs = Vendeur::query();

            // Pour chaque terme de recherche, recherche dans les champs définis
            foreach ($searchTerms as $term) {
                $vendeurs->where(function ($q) use ($term) {
                    $q->where('nom', 'like', '%' . $term . '%')
                        ->orWhere('postnom', 'like', '%' . $term . '%')
                        ->orWhere('prenom', 'like', '%' . $term . '%')
                        ->orWhere('sexe', 'like', '%' . $term . '%')
                        ->orWhere('date_naissance', 'like', '%' . $term . '%');
                });
            }

            // Obtenir les résultats finaux
            $vendeurs = $vendeurs->get();
        }else {
            $vendeurs = VendeurResource::collection(Vendeur::with('agent','userValidation')->orderBy('id', 'DESC')->get());
        }
        return view('pages.vendeurs.listeAllDonnees', compact('vendeurs'));
    }

    public function delaiPaiementDepasse()
    {
        // $year = 2024;
        // $month = 10;

        // Carbon::setLocale('fr');
        // setlocale(LC_TIME, 'fr_FR.UTF-8');

        // $startOfMonth = Carbon::createFromDate($year, $month, 1);
        // $endOfMonth = $startOfMonth->copy()->endOfMonth();

        // $days = [];

        // for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()){
        //     $days[] = [
        //         'date' => $date->toDateString(),
        //         'day_of_week' => $date->format('l')
        //     ];
        // }

        // return $days;

        $date = Carbon::now()->subDays(8);
        $vendeurs = DB::table('vendeurs')
                    ->leftJoin('vendeur_demandes', 'vendeurs.id', '=', 'vendeur_demandes.vendeur_id')
                    ->selectRaw('
                        GROUP_CONCAT(DISTINCT vendeurs.id) as vendeurId,
                        GROUP_CONCAT(DISTINCT vendeurs.datecreation) as vendeurDatecreation,
                        GROUP_CONCAT(vendeur_demandes.vendeur_id) as demandeVendeurId,
                        GROUP_CONCAT(vendeur_demandes.emplacement_id) as demandeEmplacement_id                 
                    ')
                    ->whereDate('datecreation', $date)
                    ->groupBy('vendeurs.id')
                    ->orderBy('vendeurs.id', 'asc')
                    ->get();

        // $vendeurs = DB::table('vendeur_demandes')
        //             ->join('vendeurs', 'vendeurs.id', '=', 'vendeur_demandes.vendeur_id')
        //             ->selectRaw(' 
        //                 vendeurs.id as vendeurId,
        //                 vendeurs.datecreation as vendeurDatecreation,                      
        //                 vendeur_demandes.emplacement_id as demandeEmplacement_id,                              
        //                 vendeur_demandes.id as demandeId                               
        //             ')
        //             ->whereDate('vendeurs.datecreation', $date)
        //             //->where('vendeur_demandes.emplacement_id', "<>", null)
        //             //->groupBy('vendeurs.id')
        //             ->orderBy('vendeurs.id', 'asc')
        //             ->get();
        
        $vendeurDemandes = array(); //GROUP_CONCAT(vendeur_demandes.emplacement_id) as demandeEmplacement_id    
        foreach($vendeurs as $vd){
            $vendeurDemandes[] = $vd->demandeEmplacement_id;
            // Emplacement::find($vd->demandeEmplacement_id)->update(['etat' => 0]);
            //VendeurDemande::find($vd->demandeId)->update(['emplacement_id' => null]);
        }
        //,
        //vendeur_demandes.vendeur_id as demandeId
        return $vendeurs;
    }

}
