<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'module', 'controller', 'actions', 'status', 'created_at', 'updated_at' 
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moduleGroups()
    {
        return $this->hasMany('App\Models\ModuleGroup', 'module_id');
    }
}
