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
        Schema::create('vendeur_demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained('dossiers')->onDelete('cascade')->onUpdate('cascade'); // Changement clé
            $table->foreignId('article_id')->nullable()->constrained('articles')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('pavillon_id')->nullable()->constrained('pavillons')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('place_id')->nullable()->constrained('places')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('emplacement_id')->nullable()->constrained('emplacements')->onDelete('restrict')->onUpdate('cascade');
            
            $table->double('quantite')->default(0); // Correction orthographe (optionnel)
            $table->double('prix')->default(0);
            $table->double('mois')->default(7);
            $table->double('total')->default(0);
            $table->double('remise')->default(0);
            
            $table->string('decision', 2)->nullable();
            $table->dateTime('date_decision')->nullable();
            $table->string('decision_banque', 2)->nullable();
            $table->dateTime('date_decision_banque')->nullable();
            $table->string('nom_agent_banque', 255)->nullable();
            $table->integer('userValidateur')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendeur_demandes');
    }
};
