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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);//->unique()->nullable();
            $table->double('prix')->default(0); 
            $table->foreignId('type_place_id')->nullable()->constrained('type_places')->onDelete('restrict')->onUpdate('cascade');
            $table->string('orientation')->nullable();
            // $table->double('nombre_disponible')->default(0);
            // $table->double('nbr_restant')->default(0);
            $table->integer('save_by')->nullable();
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
        Schema::dropIfExists('places');
    }
};
