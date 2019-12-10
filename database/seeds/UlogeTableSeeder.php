<?php

use Illuminate\Database\Seeder;

class UlogeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uloge')->insert([
            ['naziv' => 'Admin'],
            ['naziv' => 'Lekar'],
            ['naziv' => 'Sestra'],
        ]);
    }
}
