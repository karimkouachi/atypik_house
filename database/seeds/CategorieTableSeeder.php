<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie')->insert([
            [
            	'libelle_categorie' => 'Tipi',
                'enum_categorie' => '1;'
            ],
            [
            	'libelle_categorie' => 'Yourte mongole',
                'enum_categorie' => '1;'
            ],
            [
            	'libelle_categorie' => 'Cabane',
                'enum_categorie' => '1;'
            ],
            [
            	'libelle_categorie' => 'Igloo',
                'enum_categorie' => '1;'
            ],
            [
            	'libelle_categorie' => 'Tente suspendue',
                'enum_categorie' => '1;'
            ],
            [
            	'libelle_categorie' => 'Chalet',
                'enum_categorie' => '1;'
            ],
            [
            	'libelle_categorie' => 'Nid',
                'enum_categorie' => '1;'
            ],
        ]);
    }
}
