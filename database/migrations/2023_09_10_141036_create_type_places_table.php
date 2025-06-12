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
        Schema::create('type_places', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 10)->nullable(); 
            $table->string('dimension', 10)->nullable(); 
            $table->integer('save_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_places');
    }
};
