<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeChampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('type_champ')->insert([
    		[
    			'libelle_type_champ' => 'BOOLEAN'
    		],
            [
                'libelle_type_champ' => 'DATETIME'
            ],
            [
                'libelle_type_champ' => 'DECIMAL'
            ],
            [
                'libelle_type_champ' => 'INTEGER'
            ],
            [
                'libelle_type_champ' => 'TEXT'
            ],
            [
                'libelle_type_champ' => 'TINYINT'
            ],
            [
                'libelle_type_champ' => 'VARCHAR'
            ],
    	]);
    }
}