<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcmRPerServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcm_r_per_service', function (Blueprint $table) {
            $table->id();
            $table->string('Code_service', 5)->nullable()->comment('Code_service');
            $table->string('nom_serivce', 200)->nullable()->comment('Nom_serivce');
            $table->string('Code_service_vers', 5)->nullable()->comment('Code_service_vers');
            $table->boolean('bo_ouinon')->nullable()->comment('Bo_ouinon');
            $table->boolean('finance_ouinon')->nullable()->comment('Finance_ouinon');
            $table->boolean('Compta_ouinon')->nullable()->comment('Compta_ouinon');
            $table->smallInteger('nombrejours')->nullable()->comment('Nombrejours');
            $table->bigInteger('couleur_fond')->nullable()->comment('couleur_fond'); // 9 999 999 999 
            $table->bigInteger('couleur_police')->nullable()->comment('couleur_police'); // 9 999 999 999 
            $table->bigInteger('rang')->nullable()->comment('rang'); // 999 999 999 
            $table->string('coddep_vers', 2)->nullable()->comment('coddep_destinataire');
            $table->string('numbsor', 8)->nullable()->comment('N° bon de sortie');
            $table->string('numbret', 8)->nullable()->comment('N° bon de retour');
            $table->string('numdemappro', 8)->nullable()->comment('N° bon de sortie');
            $table->string('code_service_parent', 50)->nullable()->comment('code_service_parent');
            $table->bigInteger('numordre_arbrre')->nullable()->comment('numero ordre dans l\'arbre'); // 999 999 999 
            $table->bigInteger('numordre_parent')->nullable()->comment('numordre_parent'); // 999 999 999 
            $table->string('NOM_service_parent', 80)->nullable()->comment('NOM_service_parent');
            $table->string('Chemin_circuit', 50)->nullable()->comment('Chemin_circuit');
            $table->string('codpers_chefservice', 13)->nullable()->comment('codpers_chefservice');
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
        Schema::dropIfExists('fcm_r_per_service');
    }
}
