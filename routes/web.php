<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\AuthController;

// Route publique : afficher tous les biens
Route::get('/accueil', [BienController::class, 'index'])->name('biens.index');

// Route publique : afficher un bien spécifique
Route::get('/biens/{id}', [BienController::class, 'show'])->name('biens.show');

// Formulaire de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes accessibles uniquement aux agents
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/admin', [BienController::class, 'index'])->name('admin.dashboard');
});

// Routes accessibles uniquement aux vendeurs
Route::middleware(['auth', 'role:vendeur'])->group(function () {
    Route::get('/vendeur', [BienController::class, 'create'])->name('vendeur.dashboard');
});

// Redirect root URL to /accueil
Route::get('/', function () {
    return redirect('/accueil');
});
