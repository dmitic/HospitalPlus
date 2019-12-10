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
                'naziv' => 'Aspirin',
                'kolicina' => '25',

            ],
       
        ]);
    }
}
