<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactureTable extends Migration {

	public function up()
	{
		Schema::create('facture', function(Blueprint $table) {
			$table->increments('id_facture');
			$table->string('adrCli_facture', 100);
			$table->string('cpVilleCli_facture', 75)->nullable();
			$table->string('paysCli_facture', 50)->nullable();
			$table->decimal('montantHT_facture', 6,2);
			$table->decimal('montantTVA_facture', 6,2);
			$table->decimal('montantTTC_facture', 6,2);
			$table->boolean('etat_facture');
			$table->integer('habitat_id')->unsigned();
			$table->integer('locataire_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('facture');
	}
}