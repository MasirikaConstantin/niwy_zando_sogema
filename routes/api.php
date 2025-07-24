<?php

use App\Models\Vendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendeursControllers;
use App\Models\Dossier;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vendeurs/search', function (Request $request) {
    $query = $request->input('q'); // Récupère le terme de recherche (ex: "Jean")
    
    return Vendeur::query()
        ->where('nom', 'like', "%{$query}%") // Recherche par nom
        ->orWhere('email', 'like', "%{$query}%") // Ou par email
        ->orWhere('code_unique', 'like', "%{$query}%") // Ou par code
        ->limit(10) // Limite à 10 résultats
        ->get(['id', 'nom',"code_unique", 'email']); // Retourne uniquement ces champs
});
Route::get('/get-vendeurs', [VendeursControllers::class, 'getVendeurs'])->name('get-vendeurs');
Route::post('/get-searchAllByDate', [VendeursControllers::class, 'getSearchAllByDate'])->name('get-searchAllByDate');
Route::post('/get-searchAllByName', [VendeursControllers::class, 'getSearchAllByName'])->name('get-searchAllByName');
Route::get('/get-dossier-vendeur/{id}', [VendeursControllers::class, 'getDossierVendeur'])->name('get-dossier-vendeur');
Route::get('/dossiers/{dossier}/details', function(Dossier $dossier) {
    $vendeur = $dossier->vendeur;
    $vendeurDemandes = $dossier->vendeurDemandes()->where('decision', 1)->get();
    
    $totalApayerRemise = $vendeurDemandes->sum(function($demande) {
        if ($demande->remise > 0) {
            return $demande->total - ($demande->total * $demande->remise / 100);
        }
        return $demande->total;
    });

    return view('partials.dossier_details', compact('vendeur', 'vendeurDemandes', 'totalApayerRemise', 'dossier'))->render();
});

Route::post('/save_decision_banque', [VendeursControllers::class,'saveDecisionBanque'])->name('vend.saveDecisionBanque');
Route::get('/dossiers/{dossier}', [VendeursControllers::class, 'TransAuthDossierDetails'])->name('vend.getDossierDetails');



