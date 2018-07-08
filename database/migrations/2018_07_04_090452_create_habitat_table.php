<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHabitatTable extends Migration {

	public function up()
	{
		Schema::create('habitat', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom_habitat', 100);
			$table->integer('capacite_habitat');
			$table->decimal('prix_habitat', 6,2);
			$table->string('adresse_habitat', 100);
			$table->string('cp_habitat', 15);
			$table->string('ville_habitat', 50);
			$table->string('pays_habitat', 50)->nullable();
			$table->string('num_habitat', 20);
			$table->string('photo_habitat', 255)->nullable();
			$table->boolean('actif_habitat');
			$table->boolean('dispo_habitat');
			$table->boolean('en_attente_habitat');
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