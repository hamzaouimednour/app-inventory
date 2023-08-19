<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcPerArticle extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fc_per_article';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'id', 'Code_article', 'libe_article', 'emplacement', 'CODE_tva', 'stock_Actuel', 'stock_mintolere', 'Prix_usine', 'remise_usine', 'prixachat_ht', 'Prixachat_ttc', 'prixachat_moyenpondere', 'prixvente_ht', 'prixvente_ttc', 'Dernier_numinventaire', 'dernier_date_inventaire', 'dernier_qte_inventaire', 'article_nonstocke', 'description', 'marge_beneficiaire', 'remisemax_article', 'remisefixe_article', 'article_parlot', 'nb_piecepaquet', 'image_article', 'longueur_article', 'largeur_article', 'hauteur_article', 'poids', 'DATE_blocage', 'artile_origine', 'CODE_blocage', 'Code_unitemesure', 'Stock_depart', 'DATE_stock_depart', 'article_suittarif', 'article_suitpromotion', 'Compt_article', 'Prefixe_article', 'Utilisateur_creation', 'dateheure_creation', 'Utilisateur_modif', 'dateheure_modif', 'nbjoursrappel_avantperime', 'BLocage_articleperime', 'stockglobal', 'stockaffecte', 'stocksortexcep', 'stocksortdiv', 'cod_groupearticle', 'code_tpf', 'engin', 'Dernier_numinv', 'Code_famille', 'code_sousfamille', 'prixachat_ht_depart', 'remise_achat', 'color_gamra', 'remise_achat_plus', 'Cle_sousfamille', 'libart_short1', 'libart_short2', 'AFFiche_margebeneficiaire', 'Code_article_matiere', 'Cod_operation', 'cle_atlas', 'cODE_article_matiere_AR', 'Temp_preparation_article', 'nonAfficher_descriptionarticlevente', 'observation', 'Index_FullText', 'transferable', 'prixachange', 'prix_homologue', 'Index_FullText_libarticle', 'option_scolaire', 'service_scolaire', 'est_menu', 'IDfc_per_collaborateur', 'inter_impressionticket', 'article_matierepremierre', 'article_semifini', 'Compte_comptable_article', 'Compte_analytique_article', 'compte_budgetaire_article', 'inter_declinaison', 'article_durable', 'Article_consommation_interne', 'Article_parcautomobile', 'Cree_objetdepart', 'mouvemente', 'Article_avecnumserie', 'nbPtFideliteUnitaire', 'nbrjour_valide', 'Code_collection', 'Article_avecconsigne', 'cODE_consignearticle', 'cODE_serviceboncoupe', 'affichageConsigneAuto', 'Libe_famille', 'LIbe_soufamille', 'ref_articleorigine', 'Index_FullText_libfamille', 'Index_FullText_libsousfamille', 'codeabarre', 'prix_pose_ht', 'code_balance_art', 'codeInterne', 'raccourci_balance', 'Marge_prix_pose_ht_pachatht', 'balance_article_connecte', 'article_pese_unitaire', 'article_sansremise', 'couleur_article', 'prix_vente_public', 'width', 'weight_oz', 'quality', 'Weave', 'weight_gsm', 'typeAbonnement', 'type_a_v', 'codArtVrac', 'qteArtVrac', 'kind', 'Composition', 'density', 'stretch', 'Growth', 'recovery', 'shrinkage', 'finishing', 'Construction', 'article_rendezVous', 'stock_maxtolere', 'stock_min', 'stock_securite', 'aliment', 'indice_etatestimatif', 'indice_cuisse', 'type_poulet_dinde', 'created_at', 'updated_at' 
    ];
}
