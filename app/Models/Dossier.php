<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id', 'name', 'description', 'phone', 'dossier_creator', 'user_licenses', 'date_license', 'license_start_date', 'license_end_date', 'subdomain', 'dossier_db_name', 'status'
    ];

}
