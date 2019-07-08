<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Rol::truncate();

        Rol::create([
            'rol_key' =>'administrador',
            'rol' =>'administrador',
            'descripcion' =>'administrador del sitio'
        ]);
        
        Rol::create([
            'rol_key' =>'rescatista',
            'rol' =>'rescatista',
            'descripcion' =>'Rescatista'
        ]);
    }
}
