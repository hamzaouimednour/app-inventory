<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiEntSortieaffectationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fi_ent_sortieaffectation', function (Blueprint $table) {
            $table->id();
            $table->string('numbsor', 8)->nullable()->comment('N° bon de sortie');
            $table->date('datbsor')->nullable()->comment('Date bon sortie');
            $table->string('observation', 50)->nullable()->comment('Code_service_vers');
            $table->string('cleservdatbsor', 12)->nullable()->comment('Cleservdatbsor'); // Code_service,datbsor
            $table->string('codpers', 4)->nullable()->comment('code personnel');
            $table->boolean('logement')->nullable()->comment('Posede un logement');
            $table->string('cle_local', 14)->nullable()->comment('cle_local'); // Code_service,numbsor
            $table->string('Code_service', 5)->nullable()->comment('Code_service');
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
        Schema::dropIfExists('fi_ent_sortieaffectation');
    }
}
