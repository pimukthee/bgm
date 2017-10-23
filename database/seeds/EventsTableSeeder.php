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

        DB::table('events')->insert([
            'id' => '0003',
            'name' => 'yu_gi_oh_game_01',
            'user_id' => '3',
            'game_id' => '4',
            'location' => '521',
            'description' => 'Create a migration for the session 
            database table Create a migration for the session database table',
            'start_date' => '2008-11-10'
        ]);

        DB::table('events')->insert([
            'id' => '0004',
            'name' => 'summoners_game_01',
            'user_id' => '3',
            'game_id' => '3',
            'location' => 'maya',
            'description' => 'Create a migration for the session 
            database table Create a migration for the session database table',
            'start_date' => '2017-11-10'
        ]);
    }
}
