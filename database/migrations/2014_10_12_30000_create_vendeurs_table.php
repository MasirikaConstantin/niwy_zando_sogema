<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendeurs', function (Blueprint $table) {
            $table->id();
            $table->string('code_unique', 250)->unique()->nullable();
            $table->string('nom', 50)->nullable();
            $table->string('postnom', 50)->nullable();
            $table->string('prenom', 50)->nullable();
            $table->string('sexe', 4)->nullable();
            $table->string('lieu_naissance', 100)->nullable();
            $table->string('date_naissance', 100)->nullable();
            $table->string('residence')->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('nationalite', 50)->nullable();
            $table->string('etat_civil', 50)->nullable();
            $table->string('commune', 100)->nullable();
            $table->longText('photo')->nullable();
            $table->string('email', 100)->nullable(); 
            $table->string('numero_patente', 150)->nullable();
            $table->string('numCompteBancaire', 150)->nullable();
            $table->string('rccm', 150)->nullable();
            $table->string('rccm_patente', 10)->nullable();
            $table->string('piece_identite', 60)->nullable();
            $table->string('piece_identite_date_expiration', 20)->nullable();
            $table->string('numero_national', 18)->nullable();
            $table->text('personne_de_reference')->nullable();
            $table->foreignId('agent_id')->nullable()->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('ancien_nouveau')->default('1'); //1 = ancien 
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
        Schema::dropIfExists('vendeurs');
    }
};
