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
            $table->integer('db_id')->unsigned()->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('deuxieme_prenom')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->bigInteger('telephone_mobile')->nullable();
            $table->string('username')->unique();
            $table->foreignId('role_id')->constrained('user_roles')->onDelete('RESTRICT');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->nullable()->comment('profile picture');
            $table->boolean('active')->default(true);
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
