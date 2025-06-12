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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('restrict')->onUpdate('cascade');
            $table->string('name', 30)->nullable();
            $table->string('email', 50)->unique();
            $table->string('username', 50)->unique();
            $table->string('nom', 50)->nullable();
            $table->string('postnom', 50)->nullable();
            $table->string('prenom', 50)->nullable();
            $table->string('sexe', 10)->nullable();
            $table->boolean('status')->default(1); //['1'=>'active', '0'=>'desactive']
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
