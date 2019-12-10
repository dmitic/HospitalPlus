<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UlogeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PacijentiTableSeeder::class);
        $this->call(KartonTableSeeder::class);
        $this->call(LekoviTableSeeder::class);
        $this->call(BolestiTableSeeder::class);
        $this->call(EvLecenjaTableSeeder::class);
    }
}
