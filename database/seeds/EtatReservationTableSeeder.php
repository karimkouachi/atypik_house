<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('etat_reservation')->insert([
    		[
    			'libelle_etat' => 'Refusée',
    			'valeur_etat' => 0
    		],
    		[
    			'libelle_etat' => 'En attente',
    			'valeur_etat' => 1
    		],
    		[
    			'libelle_etat' => 'Validée',
    			'valeur_etat' => 2
    		],
    	]);
    }
}
