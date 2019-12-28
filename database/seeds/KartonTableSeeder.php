<?php

use Illuminate\Database\Seeder;

class KartonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kartoni')->insert([
            [
                'broj_kartona' => 'm-20569',
                'pacijent_id' => '1',

            ],
            [
                'broj_kartona' => 's-56894',
                'pacijent_id' => '2',

            ],
            [
                'broj_kartona' => '578/2018',
                'pacijent_id' => '3',

            ],
            [
                'broj_kartona' => '473/2018',
                'pacijent_id' => '4',

            ],
            [
                'broj_kartona' => 'm-12332',
                'pacijent_id' => '5',

            ],
            [
                'broj_kartona' => 's-3432',
                'pacijent_id' => '6',

            ],
            [
                'broj_kartona' => '345/2018',
                'pacijent_id' => '7',

            ],
            [
                'broj_kartona' => '234/2018',
                'pacijent_id' => '8',

            ],
            
       
        ]);
    }
}
