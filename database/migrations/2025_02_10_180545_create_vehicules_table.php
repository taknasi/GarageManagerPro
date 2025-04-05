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
            $table->string('immatriculation')->unique();
            $table->string('n_chassis')->nullable();
            $table->string('marque')->nullable();
            $table->string('modele')->nullable();
            $table->integer('annee_fabrication')->nullable();
            $table->string('type_carburant')->nullable();
            $table->string('categorie')->nullable();
            $table->string('couleur')->nullable();
            $table->string('kilometrage_actuel')->nullable();
            $table->string('puissance_fiscale')->nullable();
            $table->string('compagnie_assurance')->nullable();
            $table->string('numero_de_police')->nullable();
            $table->string('image')->nullable();
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
