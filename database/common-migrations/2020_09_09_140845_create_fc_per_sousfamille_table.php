<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class CreateFcPerSousfamilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc_per_sousfamille', function (Blueprint $table) {
            $table->id();
            $table->string('code_famille', 10)->nullable()->comment('code famille');
            $table->string('code_sousfamille', 10)->nullable()->comment('code sous famille');
            $table->string('Libe_soufamille', 70)->nullable()->comment('libelle sous famille');
            $table->string('cle_sousfamille', 20)->nullable()->comment('Cle_sousfamille');
            $table->bigInteger('Compt_sousfamille')->nullable()->comment('Compt_sousfamille'); // 9 999 999 999 
            $table->string('Prefixe_sousfamille', 10)->nullable()->comment('Prefixe_sousfamille');
            $table->string('Utilisateur_creation', 50)->nullable()->comment('Utilisateur_creation');
            $table->dateTime('dateheure_creation')->nullable()->comment('dateheure_creation')->default((new Expression('SYSDATE()')));
            $table->string('Utilisateur_modif', 50)->nullable()->comment('Utilisateur_modif');
            $table->dateTime('dateheure_modif')->nullable()->comment('dateheure_modif');
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
        Schema::dropIfExists('fc_per_sousfamille');
    }
}
