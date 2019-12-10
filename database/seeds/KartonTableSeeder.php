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
       
        ]);
    }
}
