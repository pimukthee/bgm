<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
    public function show(Game $game)
    {
        $users = $this->fetchTopTenPlayers($game);
        $rules = $this->splitByNewline($game->rule);
        $rankingRules = $this->splitByNewline($game->ranking_rule);
        return view('games.detail', compact('users', 'game', 'rules', 'rankingRules'));  
    }

    private function fetchTopTenPlayers($game)
    {
        return DB::table('ranks')
                    ->select('users.name', 'ranks.score','users.id')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->where('game_id', $game->id)
                    ->take(10)
                    ->orderBy('ranks.score', 'desc')
                    ->get()
                    ->toArray();
    }

    private function splitByNewline($rules)
    {
        return explode("\n", $rules);
    }
}
