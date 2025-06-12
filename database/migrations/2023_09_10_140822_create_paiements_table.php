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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->double('montant_cdf')->nullable();
            $table->double('montant_usd')->nullable();
            $table->string('datepaiment', 15)->nullable();
            $table->string('type_nationalite', 100)->nullable(); 
            $table->string('nbr_table')->nullable(); 
            
            $table->string('nbr_maison', 10)->nullable(); 
            $table->string('nbr_kiosque', 10)->nullable(); 
            $table->string('nbr_autre', 10)->nullable(); 
            
            $table->string('photo')->nullable();  
            $table->foreignId('vendeur_id')->constrained('vendeurs')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('agent_id')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('paiements');
    }
};
