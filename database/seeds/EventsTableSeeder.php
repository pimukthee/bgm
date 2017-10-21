<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'id' => '0001',
            'name' => 'mono_poly_game_01',
            'user_id' => '1',
            'game_id' => '1',
            'location' => '516',
            'description' => 'Create a migration for the session 
            database table Create a migration for the session database table',
            'start_date' => '2008-11-11'
        ]);
        DB::table('events')->insert([
            'id' => '0002',
            'name' => 'mono_poly_game_02',
            'user_id' => '2',
            'game_id' => '1',
            'location' => '404',
            'description' => 'Create a migration for the session 
            database table Create a migration for the session database table',
            'start_date' => '2008-11-11'
        ]);
    }
}
