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

        session()->flash('login_message', 'Login Successfully!');
        return redirect() -> home();
    }

    public function destroy()
    {
        auth()->logout();
        session()->flash('logout_message', 'You has been logout.');
        return redirect()->home();
    }
}
