<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            // Common fields
            $table->integer('id_client');
            $table->enum('type', ['particulier', 'societe'])->default('particulier');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('notes')->nullable();

            // Civilité (si c'est un particulier, ex: M., Mme., etc.)
            $table->string('civility')->nullable();
            $table->string('full_name')->nullable();

            // Champs spécifiques pour Société
            $table->string('company_name')->nullable();   // Raison sociale
            $table->string('legal_form')->nullable();     // Forme juridique (SARL, SAS, SA, etc.)
            $table->string('contact_person')->nullable(); // Gérant/dirigeant

            // $table->string('cin')->nullable();       // Carte d'Identité Nationale
            $table->string('rc_number')->nullable(); // Numéro de registre de commerce (RC)
            $table->string('ice')->nullable();       // ICE

            // Adresse (commune à tous types de clients)
            $table->string('address')->nullable();

            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes');

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
        Schema::dropIfExists('clients');
    }
}
