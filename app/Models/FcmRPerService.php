<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcmRPerService extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fcm_r_per_service';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'Code_service', 'nom_serivce', 'Code_service_vers', 'bo_ouinon', 'finance_ouinon', 'Compta_ouinon', 'nombrejours', 'couleur_fond', 'couleur_police', 'rang', 'coddep_vers', 'numbsor', 'numbret', 'numdemappro', 'code_service_parent', 'numordre_arbrre', 'numordre_parent', 'NOM_service_parent', 'Chemin_circuit', 'codpers_chefservice', 'created_at', 'updated_at' 
    ];
}
