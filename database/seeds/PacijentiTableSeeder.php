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
                'ime' => 'Nadežda',
                'prezime' => 'Petrović',
                'adresa' => 'Valjevska 116b',
                'grad' => 'Valjevo',
                'telefon' => '789456',
                'pol' => 'Ž',
                'datum_rodjenja' => '1950-05-26',
                'krvna_grupa' => 'AB+',
                'lbo' => '32198745685',
                'user_id' => '7',
            ],
            [
                'ime' => 'Mika',
                'prezime' => 'Antić',
                'adresa' => 'Dunavska 23',
                'grad' => 'Mokrin',
                'telefon' => '646465',
                'pol' => 'M',
                'datum_rodjenja' => '1989-08-03',
                'krvna_grupa' => 'A-',
                'lbo' => '96385274189',
                'user_id' => '7',
            ],
            [
                'ime' => 'Laza',
                'prezime' => 'Lazarević',
                'adresa' => 'Višegradska 59',
                'grad' => 'Beograd',
                'telefon' => '3896547',
                'pol' => 'M',
                'datum_rodjenja' => '1964-06-18',
                'krvna_grupa' => 'B+',
                'lbo' => '41785236978',
                'user_id' => '11',
            ]
       
        ]);
    }
}
