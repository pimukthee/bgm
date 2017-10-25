<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        auth()->user()->followings()->attach($user->id);

        $user->total_following = $user->total_following + 1;
        $user->save();
        auth()->user()->total_follower = auth()->user()->total_follower + 1;
        auth()->user()->save();

        return redirect()->back();
    }

    public function followings(User $user)
    {
       $followingList = $this->getFollowings($user);
       return view('users.following',compact('followingList'));
    }

    public function getFollowings(User $user)
    {
        return DB::table('follows')
                    ->join('users', 'following_id', '=', 'users.id')
                    ->where('follower_id', $user->id)
                    ->get();                
    }
}
