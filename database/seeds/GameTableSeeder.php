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
            'rule' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 

        DB::table('games')->insert([
            'id' => '2',
            'name' => 'warewolf',
            'categories_id' => '1',
            'icon' => 'some icon',
            'cover_picture' => 'some cover',
            'rule' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 

        DB::table('games')->insert([
            'id' => '3',
            'name' => 'summoners',
            'categories_id' => '2',
            'icon' => 'some icon',
            'cover_picture' => 'some cover',
            'rule' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 

        DB::table('games')->insert([
            'id' => '4',
            'name' => 'yu-gi-oh',
            'categories_id' => '2',
            'icon' => 'some icon',
            'cover_picture' => 'some cover',
            'rule' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'ranking_rule' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' 
        ]); 
        
    }
}
