<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    // Fonction pour afficher tous les biens
    public function index()
    {
        // Récupération de tous les biens
        $biens = Bien::all();

        // Retour de la vue principale
        return view('v_accueil', ['biens' => $biens]);
    }

    // Fonction pour afficher un bien spécifique
    public function show($id)
    {
        // Récupérer le bien par son ID
        $bien = Bien::findOrFail($id);

        // Retourner la vue avec les données du bien
        return view('biens.show', ['bien' => $bien]);
    }


}
