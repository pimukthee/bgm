<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search() {
        $this->validate(request(), [
            'word' => 'required',
            ]);
        $word =  request('word');
        if (strlen($word) >= 5 && substr($word, 0, 5) == "time:")
        {
            $events = $this->searchByTime($word);
            $users = [];
        }
        else 
        {
            $users = DB::table('users')
                ->select('name', 'id')
                ->where('name', 'LIKE', '%'.$word.'%')
                ->get();

            $events = DB::table('events')
            ->select('name', 'id')
            ->where('name', 'LIKE', '%'.$word.'%')
            ->get();

        }
        
        return view('search.show', compact('users', 'events'));
    }


    private function searchByTime($word)
    {
        return DB::table('events')
                    ->select('name', 'id')
                    ->where('start_date', 'LIKE', substr($word, 5, 10).'%')
                    ->get();
    }
}
