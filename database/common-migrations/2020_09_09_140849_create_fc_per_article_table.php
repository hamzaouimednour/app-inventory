<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class CreateFcPerArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc_per_article', function (Blueprint $table) {
            $table->id();
            $table->string('Code_article', 50)->nullable()->comment('code article');
            $table->string('libe_article', 500)->nullable()->comment('libelle article');
            $table->string('emplacement', 31)->nullable()->comment('emplacement');
            $table->string('CODE_tva', 2)->nullable()->comment('CODE_tva');
            $table->decimal('stock_Actuel', 12, 3)->nullable()->comment('stock_Actuel'); // 999 999 999,999
            $table->decimal('stock_mintolere', 12, 3)->nullable()->comment('stock minimum tolere'); // 999 999 999,999
            $table->decimal('Prix_usine', 12, 3)->nullable()->comment('PRIx d\'usine'); // 999 999 999,999
            $table->decimal('remise_usine', 5, 2)->nullable()->comment('remise usine'); // 999,99
            $table->decimal('prixachat_ht', 12, 3)->nullable()->comment('prix d\'achat ht'); // 999 999 999,999
            $table->decimal('Prixachat_ttc', 12, 3)->nullable()->comment('prix d\'achat ttc'); // 999 999 999,999
            $table->decimal('prixachat_moyenpondere', 12, 3)->nullable()->comment('prix d\'achat moyen pondre'); // 999 999 999,999
            $table->decimal('prixvente_ht', 12, 3)->nullable()->comment('prix de vente ht'); // 999 999 999,999
            $table->decimal('prixvente_ttc', 12, 3)->nullable()->comment('prix de vente ttc'); // 999 999 999,999
            $table->bigInteger('Dernier_numinventaire')->nullable()->comment('DErnier_numinventaire'); // 9 999 999 999
            $table->date('dernier_date_inventaire')->nullable()->comment('dernier date inventaire');
            $table->decimal('dernier_qte_inventaire', 12, 3)->nullable()->comment('dernier stock inventaire'); // 999 999 999,999
            $table->boolean('article_nonstocke')->nullable()->comment('article non stocke'); // Interrupteur
            $table->string('description', 8)->nullable()->comment('detail article');
            $table->decimal('marge_beneficiaire', 7, 4)->nullable()->comment('marge_beneficiaire');
            $table->decimal('remisemax_article', 5, 2)->nullable()->comment('remise max article');
            $table->decimal('remisefixe_article', 5, 2)->nullable()->comment('remise fixe article');
            $table->boolean('article_parlot')->nullable()->comment('article_parlot');
            $table->decimal('nb_piecepaquet', 12, 3)->nullable()->comment('Nbre de piece par paquet'); // 999 999 999,999
            $table->binary('image_article')->nullable()->comment('image_article');
            $table->decimal('longueur_article', 12, 3)->nullable()->comment('longueur article'); // 999 999 999,999
            $table->decimal('largeur_article', 12, 3)->nullable()->comment('largeur_article'); // 999 999 999,999
            $table->decimal('hauteur_article', 12, 3)->nullable()->comment('hauteur_article'); // 999 999 999,999
            $table->decimal('poids', 12, 3)->nullable()->comment('poids'); // 999 999 999,999
            $table->date('DATE_blocage')->nullable()->comment('DATE blocage article');
            $table->boolean('artile_origine')->nullable()->comment('artile_origine');
            $table->smallInteger('CODE_blocage')->nullable()->comment('CODE_blocage'); // 999
            $table->smallInteger('Code_unitemesure')->nullable()->comment('Code_unitemesure'); // 999
            $table->decimal('Stock_depart', 12, 3)->nullable()->comment('Stock_depart'); // 999 999 999,999
            $table->date('DATE_stock_depart')->nullable()->comment('DATE_stock_depart');
            $table->boolean('article_suittarif')->nullable()->comment('article_suittarif');
            $table->boolean('article_suitpromotion')->nullable()->comment('article_suitpromotion');
            $table->string('Compt_article', 21)->nullable()->comment('COMPt_article'); // 99 999 999 999 999 999 999
            $table->string('Prefixe_article', 20)->nullable()->comment('Prefixe_article');
            $table->string('Utilisateur_creation', 50)->nullable()->comment('Utilisateur_creation');
            $table->dateTime('dateheure_creation')->nullable()->comment('dateheure_creation')->default((new Expression('SYSDATE()')));
            $table->string('Utilisateur_modif', 50)->nullable()->comment('Utilisateur_modif');
            $table->dateTime('dateheure_modif')->nullable()->comment('dateheure_modif');
            $table->tinyInteger('nbjoursrappel_avantperime')->nullable()->comment('nbjoursrappel_avantperime');
            $table->boolean('BLocage_articleperime')->nullable()->comment('BLocage_articleperime');
            $table->bigInteger('stockglobal')->nullable()->comment('stockglobal');
            $table->bigInteger('stockaffecte')->nullable()->comment('stockaffecte');
            $table->bigInteger('stocksortexcep')->nullable()->comment('stocksortexcep');
            $table->bigInteger('stocksortdiv')->nullable()->comment('stocksortdiv');
            $table->string('cod_groupearticle', 3)->nullable()->comment('cod_groupearticle');
            $table->string('code_tpf', 2)->nullable()->comment('code tpf');
            $table->boolean('engin')->nullable()->comment('engin');
            $table->string('Dernier_numinv', 13)->nullable()->comment('Dernier_numinv');
            $table->string('Code_famille', 10)->nullable()->comment('Code_famille');
            $table->string('code_sousfamille', 10)->nullable()->comment('code_sousfamille');
            $table->decimal('prixachat_ht_depart', 12, 3)->nullable()->comment('prixachat_ht_depart'); // 999 999 999,999
            $table->decimal('remise_achat', 5, 2)->nullable()->comment('remise_achat');
            $table->string('color_gamra', 50)->nullable()->comment('color_gamra');
            $table->decimal('remise_achat_plus', 5, 2)->nullable()->comment('remise_achatplus');
            $table->string('Cle_sousfamille', 20)->nullable()->comment('Cle_sousfamille');
            $table->string('libart_short1', 12)->nullable()->comment('libart_short1');
            $table->string('libart_short2', 12)->nullable()->comment('libart_short2');
            $table->integer('AFFiche_margebeneficiaire')->unsigned()->nullable()->comment('AFFiche_margebeneficiaire');
            $table->string('Code_article_matiere', 20)->nullable()->comment('code article');
            $table->string('Cod_operation', 5)->nullable()->comment('Cod_operation');
            $table->string('cle_atlas', 45)->nullable()->comment('cle_atlas');
            $table->string('cODE_article_matiere_AR', 20)->nullable()->comment('code article');
            $table->time('Temp_preparation_article')->nullable()->comment('Temp_preparation_article');
            $table->boolean('nonAfficher_descriptionarticlevente')->nullable()->comment('Afficher_descriptionarticlevente');
            $table->string('observation', 8)->nullable()->comment('OBSER');
            $table->text('Index_FullText')->nullable()->comment('Code_article + libe_article + description + Prefixe_article + libart_short1 + libart_short2 + emplacement + observation + Code_famille + code_sousfamille');
            $table->boolean('transferable')->nullable()->comment('transferable');
            $table->boolean('prixachange')->nullable()->comment('prixachange');
            $table->decimal('prix_homologue', 12, 3)->nullable()->comment('prix_homologue'); // 999 999 999,999
            $table->longText('Index_FullText_libarticle')->nullable()->comment('libe_article');
            $table->boolean('option_scolaire')->nullable()->comment('option_scolaire');
            $table->boolean('service_scolaire')->nullable()->comment('service_scolaire');
            $table->boolean('est_menu')->nullable()->comment('Cette article est un article composé ( menu )');
            $table->bigInteger('IDfc_per_collaborateur')->nullable()->comment('Identifiant de fc_per_collaborateur');
            $table->boolean('inter_impressionticket')->nullable()->comment('inter_impressionticket');
            $table->boolean('article_matierepremierre')->nullable()->comment('article_matierepremierre');
            $table->boolean('article_semifini')->nullable()->comment('article_semifini');
            $table->string('Compte_comptable_article', 12)->nullable()->comment('COMPte_comptable_article');
            $table->string('Compte_analytique_article', 12)->nullable()->comment('Compte_analytique_article');
            $table->string('compte_budgetaire_article', 15)->nullable()->comment('compte_budgetaire_article');
            $table->boolean('inter_declinaison')->nullable()->comment('inter_declinaison');
            $table->boolean('article_durable')->nullable()->comment('article_durable');
            $table->boolean('Article_consommation_interne')->nullable()->comment('Article_consommation_interne');
            $table->boolean('Article_parcautomobile')->nullable()->comment('Article_parcautomobile');
            $table->boolean('Cree_objetdepart')->nullable()->comment('Cree_objetdepart (integrant_thabet)');
            $table->boolean('mouvemente')->nullable()->comment('mouvemente (integrant_thabet)');
            $table->boolean('Article_avecnumserie')->nullable()->comment('Article_avecnumserie');
            $table->decimal('nbPtFideliteUnitaire', 9, 3)->nullable()->comment('nbPtFideliteUnitaire'); // 999 999,999
            $table->bigInteger('nbrjour_valide')->nullable()->comment('nbrjour_valide'); // 999 999 999
            $table->bigInteger('Code_collection')->nullable()->comment('Code_collection'); // 999 999 999
            $table->boolean('Article_avecconsigne')->nullable()->comment('Article_avecconsigne');
            $table->string('cODE_consignearticle', 20)->nullable()->comment('cODE_consignearticle');
            $table->smallInteger('cODE_serviceboncoupe')->nullable()->comment('cODE_serviceboncoupe');
            $table->boolean('affichageConsigneAuto')->nullable()->comment('affichageConsigneAuto');
            $table->string('Libe_famille', 70)->nullable()->comment('Libe_famille');
            $table->string('LIbe_soufamille', 70)->nullable()->comment('LIbe_soufamille');
            $table->string('ref_articleorigine', 20)->nullable()->comment('ref_articleorigine');
            $table->text('Index_FullText_libfamille')->nullable()->comment('Libe_famille');
            $table->text('Index_FullText_libsousfamille')->nullable()->comment('LIbe_soufamille');
            $table->string('codeabarre', 20)->nullable()->comment('codeabarre ajoute pour utiliser requete(l\'ordre)');
            $table->decimal('prix_pose_ht', 12, 3)->nullable()->comment('prix_pose : prix montage de l\'article'); // 999 999 999,999
            $table->string('code_balance_art', 10)->nullable()->comment('code_balance');
            $table->string('codeInterne', 6)->nullable()->comment('codeInterne');
            $table->bigInteger('raccourci_balance')->nullable()->comment('raccourci_balance'); // 999 999 999
            $table->decimal('Marge_prix_pose_ht_pachatht', 6, 3)->nullable()->comment('Marge_prix_pose_ht_pachatht'); // 999,999
            $table->boolean('balance_article_connecte')->nullable()->comment('balance_article_connecte');
            $table->tinyInteger('article_pese_unitaire')->nullable()->comment('article_pese_unitaire'); // 9
            $table->boolean('article_sansremise')->nullable()->comment('article_sansremise');
            $table->string('couleur_article', 30)->nullable()->comment('couleur_article');
            $table->decimal('prix_vente_public', 12, 3)->nullable()->comment('prix_vente_public'); // 999 999 999,999
            $table->string('width', 50)->nullable()->comment('width (client gamra');
            $table->string('weight_oz', 50)->nullable()->comment('weight_oz (client gamra');
            $table->string('quality', 50)->nullable()->comment('quality (client gamra');
            $table->string('Weave', 50)->nullable()->comment('Weave (client gamra');
            $table->string('weight_gsm', 50)->nullable()->comment('weight_gsm (client gamra');
            $table->tinyInteger('typeAbonnement')->nullable()->comment('typeAbonnement'); // 9 
            $table->smallInteger('type_a_v')->nullable()->comment('typearticle_vente_achat'); // 9 999
            $table->string('codArtVrac', 20)->nullable()->comment('codArtVrac');
            $table->decimal('qteArtVrac', 12, 3)->nullable()->comment('qteArtVrac'); // 999 999 999,999
            $table->string('kind', 50)->nullable()->comment('kind fa (client gamra)');
            $table->string('Composition', 50)->nullable()->comment('Composition (client gamra');
            $table->string('density', 50)->nullable()->comment('density (client gamra');
            $table->string('stretch', 50)->nullable()->comment('stretch (client gamra');
            $table->string('Growth', 50)->nullable()->comment('Growth (client gamra)');
            $table->string('recovery', 50)->nullable()->comment('recovery (client gamra)');
            $table->string('shrinkage', 50)->nullable()->comment('shrinkage (client gamra)');
            $table->string('finishing', 50)->nullable()->comment('finishing (client gamra)');
            $table->string('Construction', 50)->nullable()->comment('Construction (client gamra)');
            $table->boolean('article_rendezVous')->nullable()->comment('article_rendezVous');
            $table->decimal('stock_maxtolere', 12, 3)->nullable()->comment('stock_maxtolere'); // 999 999 999,999
            $table->decimal('stock_min', 12, 3)->nullable()->comment('stock_min'); // 999 999 999,999
            $table->decimal('stock_securite', 12, 3)->nullable()->comment('stock_securite'); // 999 999 999,999
            $table->boolean('aliment')->nullable()->comment('aliment');
            $table->integer('indice_etatestimatif')->unsigned()->nullable()->comment('indice_etatestimatif');
            $table->integer('indice_cuisse')->unsigned()->nullable()->comment('indice_cuisse');
            $table->integer('type_poulet_dinde')->unsigned()->nullable()->comment('type_poulet_dinde');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fc_per_article');
    }
}
