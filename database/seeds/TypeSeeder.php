<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'type' => 'Concert',
            'categorie_id'=>1
        ]);
        DB::table('types')->insert([
            'type' => 'Forum',
            'categorie_id'=>2
        ]);
    }
}
