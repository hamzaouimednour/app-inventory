<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiMvtSortieaffectationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fi_mvt_sortieaffectation', function (Blueprint $table) {
            $table->id();
            $table->string('numbsor', 8)->nullable()->comment('N° bon de sortie');
            $table->string('clembsor', 29)->nullable()->comment('Clembsor'); // Code_service,numbsor,Numinv,Id_numinv
            $table->string('Numinv', 13)->nullable()->comment('Numinv');
            $table->string('cledepart', 17)->nullable()->comment('Cledepart'); // Code_service,Code_article
            $table->bigInteger('Id_numinv')->nullable()->comment('Id_numinv');
            $table->string('Clemuminv', 17)->nullable()->comment('Clemuminv'); // Numinv,Id_numinv
            $table->string('codpers', 4)->nullable()->comment('code personnel');
            $table->string('Code_service', 5)->nullable()->comment('Code_service');
            $table->string('Code_article', 20)->nullable()->comment('Code_article');
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
        Schema::dropIfExists('fi_mvt_sortieaffectation');
    }
}
