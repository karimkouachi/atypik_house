<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActiviteTable extends Migration {

	public function up()
	{
		Schema::create('activite', function(Blueprint $table) {
			$table->increments('id_activite');
			$table->string('libelle_activite', 100);
			$table->string('adresse_activite', 100);
			$table->string('cp_activite', 15);
			$table->string('ville_activite', 50);
			$table->string('pays_activite', 50);
			$table->string('descriptif_activite', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('activite');
	}
}