<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationTable extends Migration {

	public function up()
	{
		Schema::create('reservation', function(Blueprint $table) {
			$table->increments('id_reservation');
			$table->datetime('date_debut_reservation');
			$table->datetime('date_fin_reservation');
			$table->integer('participants_reservation');
			$table->string('commentaire_reservation', 255)->nullable();
			$table->integer('habitat_id')->unsigned();
			$table->integer('locataire_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('reservation');
	}
}