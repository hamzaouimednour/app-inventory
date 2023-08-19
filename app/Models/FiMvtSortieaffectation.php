<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiMvtSortieaffectation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fi_mvt_sortieaffectation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'numbsor', 'clembsor', 'Numinv', 'cledepart', 'Id_numinv', 'Clemuminv', 'codpers', 'Code_service', 'Code_article', 'created_at', 'updated_at' 
    ];
}
