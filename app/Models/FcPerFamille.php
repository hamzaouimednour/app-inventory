<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcPerFamille extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fc_per_famille';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'code_famille', 'Libe_famille', 'prefixe_famille', 'Compt_famille', 'Utilisateur_creation', 'dateheure_creation', 'Utilisateur_modif', 'dateheure_modif', 'logo_famille', 'ordre_affichage_famille', 'Couleur_fond_famille', 'Image_fond_famille', 'code_specialite', 'taux_remise', 'created_at', 'updated_at' 
    ];
}
