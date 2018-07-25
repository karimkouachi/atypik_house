<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateChampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('creation_champ')->insert([
    		[
    			'libelle_etat' => 'Refusée',
    			'valeur_etat' => 0
    		]
    	]);
    }
}
