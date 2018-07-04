<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionTable extends Migration {

	public function up()
	{
		Schema::create('transaction', function(Blueprint $table) {
			$table->increments('id_transaction');
			$table->decimal('montant_transaction', 6,2);
			$table->datetime('date_transaction');
			$table->decimal('tx_remboursement_transaction', 3,2)->nullable();
			$table->integer('locataire_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->integer('proprietaire_id')->unsigned();
			$table->integer('reservation_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('transaction');
	}
}