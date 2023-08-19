<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiPerInventaire extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fi_per_inventaire';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id_numinv', 'numinv', 'description', 'numserie', 'datfabrication', 'numfact', 'datfact', 'numbrec', 'datbrec', 'Codtypsortexcep', 'dattypsortexcep', 'Codfour', 'datacquisition', 'datsortexcep', 'Codorigine', 'Codetat', 'Codvaleur', 'Coddive', 'datsortdiv', 'datentdecision', 'numbsor', 'datbsor', 'codpers', 'nligne', 'clembrec', 'numbsortdiv', 'numbsortexcep', 'numdecision', 'image', 'clenumbsor', 'datannulreforme', 'clenuminv', 'Chemin_image', 'puht', 'Codtpf', 'Codtva', 'prixttc', 'clecodartnumbrec', 'cle_numbrecnuminv', 'type_transfert_collecteur', 'type_transfert_excel', 'num_operationinventaire', 'datinv', 'codeabarre_visible', 'num_ordre_frid', 'num_frid', 'Code_article', 'Code_service', 'created_at', 'updated_at' 
    ];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_numinv';
}
