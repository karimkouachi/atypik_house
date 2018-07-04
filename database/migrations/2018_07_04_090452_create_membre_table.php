<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembreTable extends Migration {

	public function up()
	{
		Schema::create('membre', function(Blueprint $table) {
			$table->increments('id_membre');
			$table->string('mail_membre', 100)->unique();
			$table->string('nom_membre', 30);
			$table->string('prenom_membre', 50);
			$table->date('naissance_membre');
			$table->string('adresse_membre', 100);
			$table->string('cp_membre', 15);
			$table->string('ville_membre', 50);
			$table->string('pays_membre', 50);
			$table->boolean('actif_membre');
			$table->string('photo_membre', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('membre');
	}
}