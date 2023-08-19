<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('alias')->nullable(false);
            $table->text('description')->nullable();
            $table->json('modules')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        DB::table('produits')->insert([
            [
                'name' =>   'Thabet',
                'alias' =>  'thabet'
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
        Schema::dropIfExists('produits');
    }
}
