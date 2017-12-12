<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Game;

class CategoriesController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        $games = Game::all();
        return view('games.list', compact('categories', 'games'));
    }
}
