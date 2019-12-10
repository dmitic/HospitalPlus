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
                'datum_posete' => '2009-05-05',
                'user_id' => '2',
                'bolest_id' => '1',
                'opis' => 'neki opis',
                'lek_id' => '1',
            ],
        ]);
    }
}
