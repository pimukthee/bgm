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
            'id' => '1',
            'name' => 'pimukthee',
            'username' => 'pimukthee',
            'email' => 'pimukthee@example.com',
            'password' => bcrypt('pimukthee')    
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'jarb',
            'username' => 'jarb',
            'email' => 'jarb@example.com',
            'password' => bcrypt('jarb')  
        ]);
    }
}
