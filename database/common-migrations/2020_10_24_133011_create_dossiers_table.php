<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable(false);
            $table->text('description')->nullable();
            $table->json('phone')->nullable();
            $table->string('user_licenses', 150)->nullable();
            $table->string('dossier_licenses', 150)->nullable();
            $table->boolean('date_license')->nullable();
            $table->timestamp('license_start_date')->nullable();
            $table->timestamp('license_end_date')->nullable();
            $table->string('subdomain', 250)->nullable(false);
            $table->string('dossier_db_name', 250)->nullable(false);
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('dossiers');
    }
}
