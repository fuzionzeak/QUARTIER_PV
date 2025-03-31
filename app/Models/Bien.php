<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    // Nom de la table associée
    protected $table = 'BIEN';

    // Nom de la clé primaire
    protected $primaryKey = 'id_bien';

    // Colonnes remplissables
    protected $fillable = [
        'titre', 'type_bien', 'type_transaction', 'disponibilite',
        'prix', 'adresse', 'cp', 'ville', 'region', 'pays',
        'superficie', 'surface_terrain', 'nb_etage', 'nb_piece',
        'nb_chambre', 'id_agent', 'id_agence'
    ];
}
