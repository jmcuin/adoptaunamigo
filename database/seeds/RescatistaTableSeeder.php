<?php

use Illuminate\Database\Seeder;
use Rescatista;

class RescatistaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	//Rescatista::truncate();

        Rescatista::create([
            'nombre' => 'admin',
            'a_paterno' => 'admin',
            'a_materno' => 'admin',
            'alias' => 'admin',
            'id_estado_municipio' => 886,
            'extranjero' => 'na',
            'calle' => 'na',
            'numero_interior' => 'na',
            'numero_exterior' => 'na',
            'colonia' => 'na',
            'cp' => 11111,
            'telefono' => '111111111',
            'email' => 'jmcuin@gmail.com',
            'es_asociacion' => false,
            'redes_sociales' => 'na',
            'historia' => 'na'
        ]);
    }
}
