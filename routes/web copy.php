<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class,'index'])->name('dashboard');

    Route::prefix('vendeur')->group(function() {
        Route::get('/create', [VendeurController::class,'create'])->name('vend.create');
        Route::post('/store', [VendeurController::class,'store'])->name('vend.store');
    }); //->middleware('auth')
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
