<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('deuxieme_prenom')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->bigInteger('telephone_mobile')->nullable();
            $table->string('username')->unique();
            $table->foreignId('role_id')->constrained('user_roles')->onDelete('RESTRICT');
            $table->bigInteger('belong_to')->nullable();
            // Owner became dossier ceator.
            $table->boolean('dossier_creator')->default(0);
            $table->string('dossier_licenses', 150)->nullable();
            $table->string('user_licenses', 150)->nullable();
            $table->boolean('date_license')->nullable();
            $table->timestamp('license_start_date')->nullable();
            $table->timestamp('license_end_date')->nullable();

            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->nullable()->comment('profile picture');
            $table->boolean('active')->default(1);
            $table->text('log_activity')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
