<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->integer('numero_carte')->nullable();
            $table->string('nom', 255)->nullable();
            $table->string('prenom', 255)->nullable();
            $table->date('date_de_naissance')->nullable();
            $table->string('lieu_de_naissance', 255)->nullable();
            $table->string('filieres', 255)->nullable();
            $table->string('niveau', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('adresse', 255)->nullable();
            $table->string('profession', 255)->nullable();
            $table->string('fonction', 255)->nullable()->comment('Fonction dans la FI.MPI.S.A.V.A');
            $table->string('contact')->nullable();
            $table->string('facebook')->nullable();
            $table->string('telephone')->nullable()->comment('Numéro de téléphone parent ou tuteur');
            $table->date('date_inscription')->nullable()->comment('Date d\'inscription');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
