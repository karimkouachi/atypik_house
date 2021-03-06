<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtatReservationTable extends Migration {

	public function up()
	{
		Schema::create('etat_reservation', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle_etat', 50);
			$table->integer('valeur_etat')->default(1);
		});
	}

	public function down()
	{
		Schema::drop('etat_reservation');
	}
}