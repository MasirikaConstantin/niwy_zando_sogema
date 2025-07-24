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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendeur_id')->constrained('vendeurs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('numdossier')->nullable()->index();
            $table->string('etat', 50)->default('attente');
            $table->dateTime('date_traitement')->nullable();
            $table->dateTime('date_paiment')->nullable();
            $table->dateTime('date_validation_dg')->nullable();
            $table->boolean('decision_dg')->default(false);
            $table->foreignId('userTraiter_id')->nullable()->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            //$table->foreignId('type_pavilon_id')->nullable()->constrained('type_pavilons')->onDelete('restrict')->onUpdate('cascade');
            $table->string('datecreation')->nullable();
            //$table->string('nom_chef_pavillon')->nullable();
            $table->string('nbr_table', 20)->nullable();
            $table->string('statut', 50)->nullable();
            $table->tinyInteger('agentBanque')->default('0');
            $table->string('decision_banque', 2)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
