<?php

use App\Models\Vendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


