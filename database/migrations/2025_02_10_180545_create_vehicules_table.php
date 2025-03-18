<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('immatriculation')->nullable();
            $table->float('n_chassis')->nullable();
            $table->string('marque')->nullable();
            $table->string('modele')->nullable();
            $table->integer('annee_fabrication')->nullable();
            $table->string('type_carburant')->nullable();
            $table->string('categorie')->nullable();
            $table->string('couleur')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vehicules');
    }
}

