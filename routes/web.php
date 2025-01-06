<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;

// Route pour afficher tous les biens
Route::get('/accueil', [BienController::class, 'index'])->name('biens.index');

// Route pour afficher un bien spécifique
Route::get('/biens/{id}', [BienController::class, 'show'])->name('biens.show');


