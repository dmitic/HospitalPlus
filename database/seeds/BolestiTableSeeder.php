<?php

use Illuminate\Database\Seeder;

class BolestiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bolesti')->insert([
            [
                'naziv' => 'Hypertensio arterialis',
                'sifra_bolesti' => 'I10',
            ],
            [
                'naziv' => 'Angina pectoris', 
                'sifra_bolesti' => 'I20',
            ],
            [
                'naziv' => 'Insufficientia cordis', 
                'sifra_bolesti' => 'I50',
            ],
            [
                'naziv' => 'Pericarditis acuta', 
                'sifra_bolesti' => 'I30',
            ],
            [
                'naziv' => 'Tachycardia paraoxysmalis', 
                'sifra_bolesti' => 'I47',
            ],
                        [
                'naziv' => 'Atherosclerosis cardiovascularis', 
                'sifra_bolesti' => 'I25',
            ],
            [
                'naziv' => 'Infarctus myocardii acutus', 
                'sifra_bolesti' => 'I21',
            ],
            [
                'naziv' => 'Morbus cordis hypertensivus', 
                'sifra_bolesti' => 'I11',
            ],
        
            [
                'naziv' => 'Arrhytmia cordis, non specificata', 
                'sifra_bolesti' => 'I49.9',
            ],
            [
                'naziv' => 'Cardiomyopathia', 
                'sifra_bolesti' => 'I42',
            ],
        ]);
    }
}
