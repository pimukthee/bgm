<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __constructor()
    {
        $this->middleware('guest');
    }
    public function create()
    {
        return view('sessions.create') -> with('title', 'BGM');
    }
    public function store()
    {
        if (!auth()->attemp([
            'username' => request('username'),
            'password' => bcrypt(request('password'))
        ])) 
        {
            return back();
        }

        return redirect() -> home();
    }
}
