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
            'description' => 'Create a migration for the session 
            database table Create a migration for the session database table',
            'start_date' => '2008-11-11'
        ]);
    }
}
