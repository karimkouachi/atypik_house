<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('habitat', function(Blueprint $table) {
			$table->foreign('proprietaire_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('habitat', function(Blueprint $table) {
			$table->foreign('categorie_id')->references('id')->on('categorie')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('facture', function(Blueprint $table) {
			$table->foreign('habitat_id')->references('id')->on('habitat')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('facture', function(Blueprint $table) {
			$table->foreign('locataire_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('message', function(Blueprint $table) {
			$table->foreign('expediteur_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('message', function(Blueprint $table) {
			$table->foreign('destinataire_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reservation', function(Blueprint $table) {
			$table->foreign('habitat_id')->references('id')->on('habitat')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reservation', function(Blueprint $table) {
			$table->foreign('locataire_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reservation', function(Blueprint $table){
			$table->foreign('etat_reservation_id')->references('id')->on('etat_reservation')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('image', function(Blueprint $table) {
			$table->foreign('habitat_id')->references('id')->on('habitat')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('image', function(Blueprint $table) {
			$table->foreign('membre_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('locataire_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('type_transaction')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('proprietaire_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('reservation_id')->references('id')->on('reservation')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('habitat_activite', function(Blueprint $table) {
			$table->foreign('habitat_id')->references('id')->on('habitat')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('habitat_activite', function(Blueprint $table) {
			$table->foreign('activite_id')->references('id')->on('activite')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('habitat', function(Blueprint $table) {
			$table->dropForeign('habitat_proprietaire_id_foreign');
		});
		Schema::table('habitat', function(Blueprint $table) {
			$table->dropForeign('habitat_categorie_id_foreign');
		});
		Schema::table('facture', function(Blueprint $table) {
			$table->dropForeign('facture_habitat_id_foreign');
		});
		Schema::table('facture', function(Blueprint $table) {
			$table->dropForeign('facture_locataire_id_foreign');
		});
		Schema::table('message', function(Blueprint $table) {
			$table->dropForeign('message_expediteur_id_foreign');
		});
		Schema::table('message', function(Blueprint $table) {
			$table->dropForeign('message_destinataire_id_foreign');
		});
		Schema::table('reservation', function(Blueprint $table) {
			$table->dropForeign('reservation_habitat_id_foreign');
		});
		Schema::table('reservation', function(Blueprint $table) {
			$table->dropForeign('reservation_locataire_id_foreign');
		});
		Schema::table('reservation', function(Blueprint $table) {
			$table->dropForeign('reservation_etat_reservation_id_foreign');
		});
		Schema::table('image', function(Blueprint $table) {
			$table->dropForeign('image_habitat_id_foreign');
		});
		Schema::table('image', function(Blueprint $table) {
			$table->dropForeign('image_membre_id_foreign');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_locataire_id_foreign');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_type_id_foreign');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_proprietaire_id_foreign');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_reservation_id_foreign');
		});
		Schema::table('habitat_activite', function(Blueprint $table) {
			$table->dropForeign('habitat_activite_habitat_id_foreign');
		});
		Schema::table('habitat_activite', function(Blueprint $table) {
			$table->dropForeign('habitat_activite_activite_id_foreign');
		});
	}
}