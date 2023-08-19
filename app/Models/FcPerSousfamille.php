<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcPerSousfamille extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fc_per_sousfamille';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'code_famille', 'code_sousfamille', 'Libe_soufamille', 'cle_sousfamille', 'Compt_sousfamille', 'Prefixe_sousfamille', 'Utilisateur_creation', 'dateheure_creation', 'Utilisateur_modif', 'dateheure_modif', 'created_at', 'updated_at' 
    ];
}
