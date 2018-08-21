<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('pseudo_membre', 50)->unique();
            $table->string('nom_membre', 30);
            $table->string('prenom_membre', 50);
            $table->date('naissance_membre')->nullable();
            $table->string('adresse_membre', 100)->nullable();
            $table->string('cp_membre', 15)->nullable();
            $table->string('ville_membre', 50)->nullable();
            $table->string('pays_membre', 50)->nullable();
            $table->tinyInteger('actif_membre')->nullable()->default(1);
            $table->string('photo_membre', 255)->nullable();
            $table->string('role_membre', 50)->default('visiteur');
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
}
