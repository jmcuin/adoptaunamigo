<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(EspeciesTableSeeder::class)
		$this->call(EstadosTableSeeder::class)
		$this->call(MunicipiosTableSeeder::class)
		$this->call(RazasTableSeeder::class)
		$this->call(RolesTableSeeder::class)
    	$this->call(RescatistaTableSeeder::class)
        $this->call(UserTableSeeder::class)
    }
}
