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
        Schema::create('avoirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_pavilon_id')->constrained('type_pavilons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vendeur_id')->constrained('vendeurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pavillon_id')->constrained('pavillons')->onDelete('cascade')->onUpdate('cascade');
            $table->string('userValidateur', 20)->nullable();
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
        Schema::dropIfExists('avoirs');
    }
};
