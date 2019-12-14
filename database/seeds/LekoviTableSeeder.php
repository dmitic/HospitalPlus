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
                'kolicina' => '250',

            ],
            [
                'naziv' => 'Lizopril',
                'kolicina' => '300',

            ],
            [
                'naziv' => 'Dilacor',
                'kolicina' => '350',

            ],
            [
                'naziv' => 'Norvasc',
                'kolicina' => '400',

            ],
            [
                'naziv' => 'Tritace comp',
                'kolicina' => '405',

            ],
            [
                'naziv' => 'Presolol',
                'kolicina' => '500',

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
                'kolicina' => '175',

            ],
       
        ]);
    }
}
