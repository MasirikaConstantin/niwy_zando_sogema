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
        Schema::create('posseders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendeur_id')->constrained('vendeurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('place_id')->constrained('places')->onDelete('cascade')->onUpdate('cascade');
            //$table->double('nbrMaison')->nullable();
            //$table->double('nbrTable')->nullable();
            //$table->double('nbrKiosque')->nullable();
            //$table->double('nbrAutre')->nullable();
            $table->double('nbr')->default(0);
            $table->double('prix')->default(0);
            $table->double('total')->nullable();
            $table->double('nbr_retenu')->default(0);
            $table->string('maitre_cube', 10)->default(0);           
            $table->string('maitre_cube_retenu', 10)->default(0);
            $table->string('decision', 10)->nullable();
            $table->integer('userValidateur')->nullable();
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
        Schema::dropIfExists('posseders');
    }
};
