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
        
        $word=  request('word');
        $users = DB::table('users')
            ->select('name', 'id')
            ->where('name', 'LIKE', '%'.$word.'%')
            ->get();

        $events = DB::table('events')
        ->select('name', 'id')
        ->where('name', 'LIKE', '%'.$word.'%')
        ->get();

        return view('search.show', compact('users', 'events'));
    }

}
