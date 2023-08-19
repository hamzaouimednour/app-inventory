<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('role', 100)->nullable(false);
            $table->string('description')->nullable();
            $table->string('alias')->nullable();
            $table->timestamps();
        });

        DB::table('user_roles')->insert([
            [
                'role' => 'Webmaster',
                'description' => "Propriétaire de l'application",
                'alias' => 'webmaster',
            ],
            [
                'role' => 'Propriétaire Dossier',
                'description' => "Propriétaire de dossier ou d'entreprise",
                'alias' => 'admin',
            ],
            [
                'role' => 'Utilisateur Dossier',
                'description' => "Utilisateur de dossier ou employeur dans l'entreprise",
                'alias' => 'user',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
