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
        Schema::create('nouveau_pavillions', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 20)->unique()->nullable();
            $table->string('code', 20)->unique()->nullable();
            $table->string('place_id', 20)->unique()->nullable();
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
        Schema::dropIfExists('nouveau_pavillions');
    }
};
