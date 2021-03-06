<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHabitatTable extends Migration {

	public function up()
	{
		Schema::create('habitat', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom_habitat', 100);
			$table->decimal('prix_habitat', 6,2);
			$table->string('num_habitat', 20);
			$table->string('photo_habitat', 255)->nullable();
			$table->tinyInteger('actif_habitat')->default(0);
			$table->tinyInteger('dispo_habitat')->default(0);
			$table->tinyInteger('en_attente_habitat')->default(1);
			$table->datetime('date_create_habitat');
			$table->datetime('date_valide_habitat')->nullable();
			$table->integer('proprietaire_id')->unsigned();
			$table->integer('categorie_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('habitat');
	}
}