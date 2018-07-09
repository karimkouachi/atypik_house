<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHabitatActiviteTable extends Migration {

	public function up()
	{
		Schema::create('habitat_activite', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('habitat_id')->unsigned();
			$table->integer('activite_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('habitat_activite');
	}
}