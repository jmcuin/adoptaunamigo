<?php

use Illuminate\Database\Seeder;
use App\Especie;

class EspeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Especie::truncate();

        Especie::create([
            'especie' => 'Canina'
        ]);
        Especie::create([
        	'especie' => 'Felina'
        ]);
    }
}
