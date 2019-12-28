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
            ],
            [
                'ime' => 'Đura',
                'prezime' => 'Đurić',
                'adresa' => 'Savski nasip bb',
                'grad' => 'Beograd',
                'telefon' => '876524452',
                'pol' => 'Ž',
                'datum_rodjenja' => '1979-07-03',
                'krvna_grupa' => '0+',
                'lbo' => '1231132',
                'user_id' => '2',
            ],
            [
                'ime' => 'Kristanna',
                'prezime' => 'Loken',
                'adresa' => 'Jurija Gagarina 116b',
                'grad' => 'Novi Beograd',
                'telefon' => '7894456',
                'pol' => 'Ž',
                'datum_rodjenja' => '1980-05-26',
                'krvna_grupa' => 'AB+',
                'lbo' => '32198742685',
                'user_id' => '7',
            ],
            [
                'ime' => 'Lazar',
                'prezime' => 'Kostić',
                'adresa' => 'Savska 23',
                'grad' => 'Čačak',
                'telefon' => '6463465',
                'pol' => 'M',
                'datum_rodjenja' => '1982-08-03',
                'krvna_grupa' => 'A-',
                'lbo' => '96385234189',
                'user_id' => '7',
            ],
            [
                'ime' => 'Duško',
                'prezime' => 'Dugouško',
                'adresa' => 'Višegradska 39',
                'grad' => 'Beograd',
                'telefon' => '3894547',
                'pol' => 'M',
                'datum_rodjenja' => '1974-06-18',
                'krvna_grupa' => 'B+',
                'lbo' => '41785234978',
                'user_id' => '11',
            ]
       
        ]);
    }
}
