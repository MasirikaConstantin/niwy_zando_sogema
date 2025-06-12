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
        Schema::create('concerners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->constrained('places')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('vendeur_id')->constrained('vendeurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('concerners');
    }
};
