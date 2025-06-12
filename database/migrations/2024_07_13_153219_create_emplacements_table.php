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
        Schema::create('emplacements', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 30)->nullable(); 
            $table->foreignId('pavillon_id')->nullable()->constrained('pavillons')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('place_id')->nullable()->constrained('places')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('article_id')->nullable()->constrained('articles')->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('etat')->default('0'); 
            $table->integer('save_by')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplacements');
    }
};
