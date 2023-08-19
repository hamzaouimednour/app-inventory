<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'deuxieme_prenom', 'email', 'telephone', 'telephone_mobile', 'username', 'password', 'role_id', 'active', 'profile_picture', 'log_activity','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPermissions()
    {
        return $this->hasMany('App\Models\UserPermissions');
    }

    public function activityLogs()
    {
        return $this->hasMany('App\Models\ActivityLog');
    }

    public function userRole()
    {
        return $this->belongsTo('App\Models\UserRole', 'role_id');
    }
}
