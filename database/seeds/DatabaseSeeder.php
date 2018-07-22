<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorieTableSeeder::class);
        $this->call(EtatReservationTableSeeder::class);
        $this->call(TypeChampTableSeeder::class);
    }
}
