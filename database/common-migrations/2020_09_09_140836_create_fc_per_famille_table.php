<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class CreateFcPerFamilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc_per_famille', function (Blueprint $table) {
            $table->id();
            $table->string('code_famille', 10)->nullable()->comment('code famille');
            $table->string('Libe_famille', 70)->nullable()->comment('libelle famille');
            $table->string('prefixe_famille', 10)->nullable()->comment('prefix_famille');
            $table->bigInteger('Compt_famille')->nullable()->comment('Compt_famille'); // 9 999 999 999 
            $table->string('Utilisateur_creation', 50)->nullable()->comment('Utilisateur_creation');
            $table->dateTime('dateheure_creation')->nullable()->comment('dateheure_creation')->default((new Expression('SYSDATE()')));
            $table->string('Utilisateur_modif', 50)->nullable()->comment('Utilisateur_modif');
            $table->dateTime('dateheure_modif')->nullable()->comment('dateheure_modif');
            $table->binary('logo_famille')->nullable()->comment('logo_famille');
            $table->smallInteger('ordre_affichage_famille')->nullable()->comment('Ordre_affichage'); // 999
            $table->string('Couleur_fond_famille', 50)->nullable()->comment('Couleur_famille');
            $table->binary('Image_fond_famille')->nullable()->comment('Image_fond_famille');
            $table->bigInteger('code_specialite')->nullable()->comment('code_specialite'); // 999 999 999
            $table->decimal('taux_remise', 5, 2)->nullable()->comment('REMISE'); // 999. 99
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
        Schema::dropIfExists('fc_per_famille');
    }
}
