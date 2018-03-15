<?php

use Illuminate\Database\Seeder;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lieux')->insert([
            'label' => 'Palais de la culture',
            'town' => 'Abidjan',
            'district' => 'Treichville'
        ]);

        DB::table('lieux')->insert([
            'label' => 'Hotel Ivoire',
            'town' => 'Abidjan',
            'district' => 'Cocody'
        ]);
    }
}
