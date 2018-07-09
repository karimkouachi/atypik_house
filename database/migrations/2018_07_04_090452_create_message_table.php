<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	public function up()
	{
		Schema::create('message', function(Blueprint $table) {
			$table->increments('id');
			$table->string('contenu_message', 255);
			$table->datetime('date_message');
			$table->integer('expediteur_id')->unsigned();
			$table->integer('destinataire_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('message');
	}
}