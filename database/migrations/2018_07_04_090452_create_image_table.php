<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageTable extends Migration {

	public function up()
	{
		Schema::create('image', function(Blueprint $table) {
			$table->increments('id_image');
			$table->string('url_image', 255);
			$table->date('date_image');
			$table->integer('habitat_id')->unsigned();
			$table->integer('membre_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('image');
	}
}