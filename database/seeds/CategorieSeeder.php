<?php

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categorie' => 'Activité économique'
        ]);
        DB::table('categories')->insert([
            'categorie' => 'Activité culturelle'
        ]);
    }
}
