<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->insert([
            'user_id' => '1',
            'game_id' => '1',
            'score' => '100'
        ]);
        DB::table('ranks')->insert([
            'user_id' => '1',
            'game_id' => '2',
            'score' => '292'
        ]); 
        DB::table('ranks')->insert([
            'user_id' => '2',
            'game_id' => '4',
            'score' => '544'
        ]); 
        DB::table('ranks')->insert([
            'user_id' => '1',
            'game_id' => '4',
            'score' => '231'
        ]); 
        DB::table('ranks')->insert([
            'user_id' => '2',
            'game_id' => '2',
            'score' => '123'
        ]); 
    }
}
