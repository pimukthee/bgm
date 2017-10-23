<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function list()
    {
        $users  = User::all();
        return view('users.users', compact('users'));
    }

    public function show(User $user) 
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user) 
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
     
        
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        
        return redirect()->home();
       
    }
}
