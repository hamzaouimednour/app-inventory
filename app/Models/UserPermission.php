<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'user_id', 'groups', 'status', 'created_at', 'updated_at' 
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function groupPermission()
    {
        return $this->belongsTo('App\Models\GroupPermission', 'group_id');
    }
}
