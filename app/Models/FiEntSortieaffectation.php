<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiEntSortieaffectation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fi_ent_sortieaffectation';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'numbsor', 'datbsor', 'observation', 'cleservdatbsor', 'codpers', 'logement', 'cle_local', 'Code_service', 'created_at', 'updated_at' 
    ];
}
