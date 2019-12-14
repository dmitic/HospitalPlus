<?php

use Illuminate\Database\Seeder;

class EvLecenjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evidencija_lecenja')->insert([
            [
                'karton_id' => '1',
                'datum_posete' => '2017-05-05',
                'user_id' => '2',
                'bolest_id' => '1',
                'opis' => 'Pacijenti sa povišenim krvnim pritiskom mogu imati vrlo raznolike simptome,
                 zavisno od toga da li je još neki sistem organa napadnut i oštećen dugogodišnjom hipretenzijom.
                 Organi koji najviše trpe i stradaju u hipertenziji su: srce, oči, bubrezi i krvni sudovi.',
                'lek_id' => '5',
                'kolicina' => '3',
            ],
            [
                'karton_id' => '1',
                'datum_posete' => '2018-04-05',
                'user_id' => '2',
                'bolest_id' => '1',
                'opis' => 'Veoma je važno merenje krvnog pritiska u kućnim uslovima jer je dokazano da pacijenti imaju veći pritisak 
                kod lekara nego u kući.Pritisak treba meriti po mogućstvu u istom položaju, na istoj ruci i istim aparatom.',
                'lek_id' => '1',
                'kolicina' => '5',
            ],
            [
                'karton_id' => '2',
                'datum_posete' => '2019-03-05',
                'user_id' => '7',
                'bolest_id' => '2',
                'opis' => 'Napad angine pektoris se prepoznaje kao bol ili izrazita nelagoda u trajanju od nekoliko minuta u grudnom košu. 
                Javlja se i probadanje, stiskanje i osećaj težine u grudnom košu, levoj ruci i donjoj vilici.',
                'lek_id' => '6',
                'kolicina' => '8',
            ],
            [
                'karton_id' => '2',
                'datum_posete' => '2019-09-05',
                'user_id' => '7',
                'bolest_id' => '2',
                'opis' => 'Često se javlja nakon izlaganja većim fizičkim naporima, hladnoći, kod stresnih situacija, 
                nakon preteranog unosa alkohola i cigareta i prilikom polnih odnosa.',
                'lek_id' => '7',
                'kolicina' => '7',
            ],
            [
                'karton_id' => '3',
                'datum_posete' => '2016-04-05',
                'user_id' => '11',
                'bolest_id' => '7',
                'opis' => 'Bol u grudima, EKG (elektrokardiografija), 
                Laboratorijske analize (kreatinfosfokinaza - CK i to naročito MB frakcija, troponin I i T i mioglobin)',
                'lek_id' => '9',
                'kolicina' => '20',
            ],
        ]);
    }
}
