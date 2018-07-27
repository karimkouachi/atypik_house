<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreationChampTableSeeder extends Seeder
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
    			'libelle_champ' => 'ville_habitat',
    			'longueur_champ' => 255,
                'null_champ' => 0,
                'type_champ_id' => 7,
                'placeholder_champ' => "Paris"
    		]
    	]);
    }
}
