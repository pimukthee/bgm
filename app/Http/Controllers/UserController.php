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
            'email' => 'required|email',
            'about_me' => 'required'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->about_me = request('about_me');
        $user->save();
        
        return redirect()->back();
       
    }

    public function follow(User $user)
    {
        return redirect()->home();
        $follow = new Follow;
        $follow->follower_id = auth()->user()->id;
        $follow->following_id = $user->id;
        $follow.save();
    }

}
