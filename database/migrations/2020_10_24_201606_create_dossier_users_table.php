<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_users', function (Blueprint $table) {
            $table->id();
            //dossier
            $table->foreignId('dossier_id')->constrained('dossiers')->onDelete('cascade');
            //user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //user permissions
            $table->foreignId('group_id')->constrained('permission_groups')->onDelete('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('user_dossiers');
    }
}
