<?php

use Illuminate\Support\Facades\Route;

//Page d'accueil :
Route::get('/QuartierPrive/accueil', function () {
    return view('v_accueil');
});
