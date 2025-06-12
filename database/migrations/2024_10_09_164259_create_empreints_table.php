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
        Schema::create('empreints', function (Blueprint $table) {
            $table->id();
            $table->text('doigt_droite1')->nullable(); 
            $table->text('doigt_droite2')->nullable(); 
            $table->text('doigt_droite3')->nullable(); 
            $table->text('doigt_droite4')->nullable(); 
            $table->text('doigt_droite5')->nullable(); 

            $table->text('doigt_gauche1')->nullable(); 
            $table->text('doigt_gauche2')->nullable(); 
            $table->text('doigt_gauche3')->nullable(); 
            $table->text('doigt_gauche4')->nullable();
            $table->text('doigt_gauche5')->nullable(); 
            $table->timestamps();
            $table->foreignId('vendeur_id')->constrained('vendeurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('save_by_id')->nullable()->constrained('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empreints');
    }
};
