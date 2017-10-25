<?php

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            ['user_id' => '1', 
            'event_id' => '1'],
            ['user_id' => '2', 
            'event_id' => '2'],
            ['user_id' => '3', 
            'event_id' => '3'],
            ['user_id' => '3', 
            'event_id' => '4'],
        ]); 
    }
}
