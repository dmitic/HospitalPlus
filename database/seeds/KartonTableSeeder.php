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
            
       
        ]);
    }
}
