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
            	'libelle_categorie' => 'Tipi'
            ],
            [
            	'libelle_categorie' => 'Yourte mongole'
            ],
            [
            	'libelle_categorie' => 'Cabane'
            ],
            [
            	'libelle_categorie' => 'Igloo'
            ],
            [
            	'libelle_categorie' => 'Tente suspendue'
            ],
            [
            	'libelle_categorie' => 'Chalet'
            ],
            [
            	'libelle_categorie' => 'Nid'
            ],
        ]);
    }
}
