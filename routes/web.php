<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\PavillonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\TypePlaceController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\VendeurDemandeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['auth','checkStatutUserActivate']], function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboards');
    Route::get('/home', [DashboardController::class,'index'])->name('dashboardss');

    // Route::prefix('article')->group(function() {
    //     Route::get('/liste', [ArticleController::class, 'index'])->name('article.index');
    //     //Articles all ajax
    //     Route::get('/get_all_articles', [ArticleController::class,'getAllArticles'])->name('getAllArticles');
    //     Route::get('/search', [ArticleController::class, 'search'])->name('article.search');
    //     Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
    //     Route::post('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    //     Route::get('/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    // });

    // Route::prefix('emplacement')->group(function() {
    //     Route::get('/liste', [EmplacementController::class, 'index'])->name('emplacement.index');
    //     Route::post('/store', [EmplacementController::class, 'store'])->name('emplacement.store');

    // });

    Route::prefix('statistique')->group(function() {
        //Route::get('/', [EmplacementController::class, 'index'])->name('emplacement.index');
        Route::get('/pavillons', [PavillonController::class, 'statistiquePavillons'])->name('statistiquePavillons'); //http://localhost:8000/statistique/pavillons
        Route::get('/pavillonsSearch', [PavillonController::class, 'statistiquePavillonsSearch'])->name('statistiquePavillonsSearch'); //http://localhost:8000/statistique/pavillonsSearch
        Route::get('/pavillon-details-emplacement/{idPavillon?}', [PavillonController::class, 'pavillonDetailsEmplacement'])->name('pavillonDetailsEmplacement');
        
        Route::get('/places', [PlaceController::class, 'statistiquePlace'])->name('statistiquePlace');
        Route::get('/placesDashboard', [PlaceController::class, 'statistiquePlaceDashboard'])->name('statistiquePlaceDashboard');
        //Route::get('/places-details-emplacement/{idPlace}', [PlaceController::class, 'placeDetailsEmplacement'])->name('placeDetailsEmplacement');
        Route::get('/places/details-emplacement/{idPlace}', [PlaceController::class, 'placeDetailsEmplacement'])->name('placeDetailsEmplacement');
    });

    Route::prefix('parametre')->group(function() {

        //Pavillon
        Route::get('/pavillon/liste', [PavillonController::class, 'index'])->name('pavillon.index');
        Route::get('/pavillon/search', [PavillonController::class, 'search'])->name('pavillon.search');
        Route::post('/pavillon/store', [PavillonController::class, 'store'])->name('pavillon.store');
        Route::get('/pavillon/edit/{id}', [PavillonController::class, 'edit'])->name('pavillon.edit');

        Route::post('/pavillon/update/{id}', [PavillonController::class, 'update'])->name('pavillon.update');
        Route::post('/pavillon/delete', [PavillonController::class, 'delete'])->name('pavillon.delete');

        Route::get('/pavillon_getPavillonBySecteurActiviterIdAndPlaceId', [PavillonController::class,'getPavillonBySecteurActiviterIdAndPlaceId'])->name('pavillon.getPavillonBySecteurActiviterIdAndPlaceId');


        Route::get('/typeplace/liste', [TypePlaceController::class, 'index'])->name('typePlace.index');
        Route::post('/typeplace/store', [TypePlaceController::class, 'store'])->name('typePlace.store');
        Route::post('/typeplace/update/{id}', [TypePlaceController::class, 'update'])->name('typePlace.update');
        
        //Place 
        Route::get('/place/liste', [PlaceController::class, 'index'])->name('place.index');
        Route::post('/place/store', [PlaceController::class, 'store'])->name('place.store');
        Route::post('/place/update/{id}', [PlaceController::class, 'update'])->name('place.update');
        Route::get('/place/get_prix_by_id', [PlaceController::class, 'getPrixById'])->name('place.getPrixById');

        //Article
        Route::get('/article/liste', [ArticleController::class, 'index'])->name('article.index');
        //Articles all ajax
        Route::get('/article/get_all_articles', [ArticleController::class,'getAllArticles'])->name('getAllArticles');
        Route::get('/article/search', [ArticleController::class, 'search'])->name('article.search');
        Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
        Route::post('/article/update/{id}', [ArticleController::class, 'update'])->name('article.update');
        Route::get('/article/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');

        //Emplacement
        Route::get('/emplacement/liste', [EmplacementController::class, 'index'])->name('emplacement.index');
        Route::post('/emplacement/store', [EmplacementController::class, 'store'])->name('emplacement.store');
        Route::post('/emplacement/update/{id}', [EmplacementController::class, 'update'])->name('emplacement.update');
        Route::get('/emplacement/get_by_id_article', [EmplacementController::class, 'getEmplacementByIdArticle'])->name('getEmplacementByIdArticle');

        Route::get('/emplacement/getEmplacementByPavillon', [EmplacementController::class, 'getEmplacementByPavillon'])->name('getEmplacementByPavillon');

    });



    Route::prefix('vendeur')->middleware('auth')->group(function() {
        Route::get('/select-choix-save', [VendeurController::class,'selectChoixSave'])->name('selectChoixSave');
        //Route::get('/pre-enregistrement', [VendeurController::class,'create'])->name('vend.create');
        Route::get('/create', [VendeurController::class,'create'])->name('vend.create');
        Route::post('/store', [VendeurController::class,'store'])->name('vend.store');
        Route::post('/storeAjax', [VendeurController::class,'storeAjax'])->name('vend.StoreAjax');
        Route::get('/listeAll', [VendeurController::class,'index'])->name('vend.index');
        Route::get('/liste/fiche_pdf/{idVendeur}', [VendeurController::class,'pDFFicheVendeur'])->name('vend.fichePDF');
        Route::get('/liste/details-infos-vendeur-pour-validation/{idVendeur}', [VendeurController::class,'detailsInfosVendeurPourValidation'])->name('vend.detailsInfosVendeurPourValidation');
        Route::post('/liste/details-infos-vendeur-pour-validation-store/{idVendeur}', [VendeurController::class,'detailsInfosVendeurPourValidationStore'])->name('vend.detailsInfosVendeurPourValidationStore');
        Route::get('/vendeur_traiter/{idVendeur}', [VendeurController::class,'vendeurTraiter'])->name('vend.vendeurTraiter');

        Route::get('/liste/details-vendeur-validation-dg/{idVendeur}', [VendeurController::class,'detailsVendeurValidationDG'])->name('vend.detailsVendeurValidationDG');

        
        Route::get('/etat/{etat}', [VendeurController::class,'listVendeurParEtat'])->name('vend.listVendeurParEtat'); 

        Route::post('/save_remise', [VendeurController::class,'saveRemise'])->name('vend.saveRemise');
        Route::get('/terminer_dg/{idVendeur}', [VendeurController::class,'terminerDg'])->name('vend.terminerDg');
        
        Route::post('/save_decision_banque', [VendeurController::class,'saveDecisionBanque'])->name('vend.saveDecisionBanque');
        
        Route::get('/contrat/{idVendeur}', [VendeurController::class,'vendeurContrat'])->name('vend.vendeurContrat');
        Route::get('/contrat_imprimer', [VendeurController::class,'contratImprimer'])->name('vend.contratImprimer');
        
        Route::post('/search_all_by_date', [VendeurController::class,'searchAllByDate'])->name('vend.searchAllByDate');
        Route::post('/search_all_by_name', [VendeurController::class,'searchAllByName'])->name('vend.searchAllByName');
        
        Route::get('/delai-paiement-depasse', [VendeurController::class,'delaiPaiementDepasse'])->name('vend.delaiPaiementDepasse');
       
        Route::get('/edit/{idVendeur}', [VendeurController::class,'edit'])->name('vend.edit');
        Route::post('/edit_identite/{idVendeur}', [VendeurController::class,'editIdentiteUpdate'])->name('vend.editIdentiteUpdate');
        

    }); //->middleware('auth')

    Route::prefix('Demande')->group(function() {
        Route::post('/saveDecision', [VendeurDemandeController::class,'saveDecision'])->name('saveDecision');
        
        Route::post('/delete-one-demade', [VendeurDemandeController::class,'deleteOneDemade'])->name('deleteOneDemade');

        Route::get('/ajouter_demande/{idVendeur}', [VendeurDemandeController::class,'ajouterDemande'])->name('vend.ajouterDemande');
    });
    

    //Users
    Route::prefix('dossier')->group(function() {
        Route::get('/dossier', [DossierController::class, 'index'])->name('dossier.index');
        Route::get('/create/{vendeur}', [DossierController::class, 'create'])->name('dossier.create');
        Route::get('/details/{idDossier}', [DossierController::class, 'dossierDetails'])->name('dossier.details');
        Route::get('/search', [DossierController::class, 'searchDossier'])->name('dossier.search');
        //Route::post('/store', [DossierController::class, 'storeDossier'])->name('dossier.store');
        //Route::post('/update/{idDossier}', [DossierController::class, 'updateDossier'])->name('dossier.update');



        Route::post('/store', [DossierController::class, 'store'])->name('dossier.store');
        Route::get('/{id}', [DossierController::class, 'show'])->name('dossier.show');
        Route::get('/{id}/edit', [DossierController::class, 'edit'])->name('dossier.edit');
        Route::put('/{id}', [DossierController::class, 'update'])->name('dossier.update');
        Route::put('/{id}', [DossierController::class, 'destroy'])->name('dossier.destroy');
    });
    
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/status/user/{id}', [UserController::class,'userStatus'])->name('userStatus');
        
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/agent-nbr-vendeur/{idagent?}', [VendeurController::class,'angentSavedVendeur1'])->name('user.angentSaved');
        Route::get('/passewordreset/{idagent}', [UserController::class,'passewordReset'])->name('passewordReset');


        //Route::get('/f', UserController::class)->middleware(['auth.admin']);
       
        Route::get('/search/user', [UserController::class,'seacheuser'])->name('seacheuser');

        Route::get('/agent/user', [UserController::class,'agent'])->name('agent');
        
        Route::get('/mon_compte/{idUSer}', [UserController::class,'monCompte'])->name('monCompte');
        Route::post('/mon_compte_update/{idUSer}', [UserController::class,'monCompteUpdate'])->name('user.monCompteUpdate');
        Route::post('/monCompteUpdatePwd/{idUSer}', [UserController::class,'monCompteUpdatePwd'])->name('user.monCompteUpdatePwd');
    });

    Route::get('/search/search-vendeur-form', [VendeurController::class, 'searchVendeurForm'])->name('searchVendeurForm');
    Route::get('/search/search-vendeur-store', [VendeurController::class, 'searchVendeurStore'])->name('searchVendeurStore');
    
    Route::post('/search/vendeurUpdateBanque/{idVendeur}', [VendeurController::class, 'vendeurUpdateBanque'])->name('vendeurUpdateBanque');

    Route::prefix('statistique')->group(function() {
        Route::get('/liste_pavillon', [StatistiqueController::class,'listePavillon'])->name('stat.listePavillon');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
