<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategorieTable extends Migration {

	public function up()
	{
		Schema::create('categorie', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle_categorie', 100);
			$table->longText('enum_categorie')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('categorie');
	}
}