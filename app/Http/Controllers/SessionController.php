<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create') -> with('title', 'BGM');
    }
    public function store()
    {
        if (!auth()->attempt(request(['username', 'password']))) 
        {
            return view('sessions.create') -> with('title', request('password'));
        }

        return redirect() -> home();
    }

    public function destroy()
    {
        auth()->logout();
        return back();
    }
}
