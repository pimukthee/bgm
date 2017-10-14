<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create() {
        
        return view('sessions.create')->with('title', 'BGM');
    }

    public function store() 
    {
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create( [
            'name' => request('name'),
            'username' => request('username'), 
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        
        return redirect()->home();
    }
}
