<?php

use Illuminate\Database\Seeder;

class LekoviTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lekovi')->insert([
            [
                'naziv' => 'Aspirin protect',
                'kolicina' => '25',

            ],
            [
                'naziv' => 'Lizopril',
                'kolicina' => '30',

            ],
            [
                'naziv' => 'Dilacor',
                'kolicina' => '35',

            ],
            [
                'naziv' => 'Norvasc',
                'kolicina' => '40',

            ],
            [
                'naziv' => 'Tritace comp',
                'kolicina' => '45',

            ],
            [
                'naziv' => 'Presolol',
                'kolicina' => '50',

            ],
            [
                'naziv' => 'Propranolol',
                'kolicina' => '55',

            ],
            [
                'naziv' => 'Cardiovitamin',
                'kolicina' => '60',

            ],
            [
                'naziv' => 'Cardiopirin',
                'kolicina' => '65',

            ],
            [
                'naziv' => 'Erynorm plus',
                'kolicina' => '75',

            ],
       
        ]);
    }
}
