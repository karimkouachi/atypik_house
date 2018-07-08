<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeTransactionTable extends Migration {

	public function up()
	{
		Schema::create('type_transaction', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle_type', 100);
		});
	}

	public function down()
	{
		Schema::drop('type_transaction');
	}
}