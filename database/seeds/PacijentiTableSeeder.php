<?php

use Illuminate\Database\Seeder;

class PacijentiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacijenti')->insert([
            [
                'ime' => 'Pera',
                'prezime' => 'Perić',
                'adresa' => 'Savski nasip 17',
                'grad' => 'Beograd',
                'telefon' => '87654452',
                'pol' => 'Ž',
                'datum_rodjenja' => '1979-08-03',
                'krvna_grupa' => '0+',
                'lbo' => '123132',
                'user_id' => '2',
            ],
            [
                'ime' => 'Mika',
                'prezime' => 'Mikić',
                'adresa' => 'Savksa 23',
                'grad' => 'Beograd',
                'telefon' => '646465',
                'pol' => 'M',
                'datum_rodjenja' => '1989-08-03',
                'krvna_grupa' => '0+',
                'lbo' => '56545654565',
                'user_id' => '7',
            ],
       
        ]);
    }
}
