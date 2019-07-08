<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rescatista;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	User::truncate();

        $user = User::create([
            'nombre' => 'admin',
            'email' => 'jmcuin@gmail.com',
            'password' => bcrypt('123123'),
            'id_rescatista' => 1,
            'historia' => 'na'
        ]);

        $user -> roles() -> attach(1);
    }
}
