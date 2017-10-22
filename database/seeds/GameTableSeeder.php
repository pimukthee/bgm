<?php

use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'id' => '1',
            'name' => 'monopoly',
            'categories_id' => '1',
            'icon' => 'some icon',
            'cover_picture' => 'some cover',
            'rule' => 'Lorem ipsum dolor sit amet.',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 

        DB::table('games')->insert([
            'id' => '2',
            'name' => 'warewolf',
            'categories_id' => '1',
            'icon' => 'some icon',
            'cover_picture' => 'some cover',
            'rule' => 'Lorem ipsum dolor sit amet.',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 

        DB::table('games')->insert([
            'id' => '3',
            'name' => 'summoners',
            'categories_id' => '2',
            'icon' => 'some icon',
            'cover_picture' => 'some cover',
            'rule' => 'Lorem ipsum dolor sit amet.',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 

        DB::table('games')->insert([
            'id' => '4',
            'name' => 'yu-gi-oh',
            'categories_id' => '2',
            'icon' => 'some icon',
            'cover_picture' => 'some cover',
            'rule' => 'Lorem ipsum dolor sit amet.',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 
    }
}
