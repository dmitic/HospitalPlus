<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'ime' => 'John',
                'prezime' => 'Doe',
                'telefon' => '12345678',
                'email' => 'admin@admin.com',
                'username' => 'jdoe',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '1'
            ],
            [
                'ime' => 'Kerry',
                'prezime' => 'Weaver',
                'telefon' => '12345678',
                'email' => 'kerry@lekar.com',
                'username' => 'kweaver',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '2'
            ],
            [
                'ime' => 'Chuny',
                'prezime' => 'Marquez',
                'telefon' => '12345678',
                'email' => 'chuny@sestra.com',
                'username' => 'cmarquez',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '3'
            ],
            [
                'ime' => 'Malik',
                'prezime' => 'McGrath',
                'telefon' => '12345678',
                'email' => 'malik@sestra.com',
                'username' => 'malik',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '3'
            ],
            [
                'ime' => 'Abby',
                'prezime' => 'Lockhart',
                'telefon' => '12345678',
                'email' => 'abby@sestra.com',
                'username' => 'abby',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '3'
            ],
            [
                'ime' => 'Haleh',
                'prezime' => 'Adams',
                'telefon' => '12345678',
                'email' => 'haleh@sestra.com',
                'username' => 'hadams',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '3'
            ],
            [
                'ime' => 'Mark',
                'prezime' => 'Greene',
                'telefon' => '12345678',
                'email' => 'mark@lekar.com',
                'username' => 'marko',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '2'
            ],
            [
                'ime' => 'Doris',
                'prezime' => 'Pickman',
                'telefon' => '12345678',
                'email' => 'doris@sestra.com',
                'username' => 'doris',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '3'
            ],
            [
                'ime' => 'Elizabeth',
                'prezime' => 'Corday',
                'telefon' => '12345678',
                'email' => 'elizabeth@sestra.com',
                'username' => 'Elizabeth',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '3'
            ],
            [
                'ime' => 'Susan',
                'prezime' => 'Lewis',
                'telefon' => '12345678',
                'email' => 'lewis@sestra.com',
                'username' => 'Lewis',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '3'
            ],
            [
                'ime' => 'Jerry',
                'prezime' => 'Markovic',
                'telefon' => '12345678',
                'email' => 'markovic@lekar.com',
                'username' => 'JMarkovic',
                'password' => \Hash::make('12345678'),
                'uloga_id' => '2'
            ],

        ]);
    }
}
