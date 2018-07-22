<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampHabitatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champ_habitat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('habitat_id')->unsigned();
            $table->integer('champ_id')->unsigned();
            $table->string('valeur_champ_habitat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('champ_habitat');
    }
}
