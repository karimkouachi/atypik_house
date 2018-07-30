<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreationChampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creation_champ', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label_champ');
            $table->string('libelle_champ');
            $table->integer('longueur_champ')->nullable();
            $table->tinyInteger('null_champ')->default(0);
            $table->integer('type_champ_id')->unsigned();
            $table->string('placeholder_champ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creation_champ');
    }
}
