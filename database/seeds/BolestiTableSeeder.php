<?php

use Illuminate\Database\Seeder;

class BolestiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bolesti')->insert([
            [
                'naziv' => 'Hipertenzija',
                'sifra_bolesti' => 'I10',
            ],
        ]);
    }
}
