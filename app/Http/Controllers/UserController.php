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
        $ranks = DB::table('ranks')
                    ->select('games.name', 'ranks.score')
                    ->join('games', 'game_id', '=', 'games.id')
                    ->where('user_id', $user->id)
                    ->get()
                    ->toArray();

        $lastGames = DB::table('recent_games')
                            ->select('games.name', 'recent_games.place','recent_games.user_id')
                            ->join('events', 'recent_games.event_id', '=', 'events.id')
                            ->join('games', 'games.id', '=', 'events.game_id')
                            ->groupBy('events.game_id')
                            ->having('recent_games.user_id', '=', 1)
                            ->get();

        $follow = DB::table('follows')
                             ->select('following_id')
                            ->where('follower_id', auth()->id())
                            ->where('following_id', $user->id)
                            ->count();
                     
        return view('users.show', compact('user','ranks', 'lastGames', 'follow'));
    }

    public function edit(User $user) 
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $user->name = request('name');
        $user->save();
        
        return redirect('/users/'.$user->id);
       
    }

    public function follow(User $user)
    {
        auth()->user()->followings()->attach($user->id);

        $user->total_follower = $user->total_follower + 1;
        $user->save();
        auth()->user()->total_following = auth()->user()->total_following + 1;
        auth()->user()->save();

        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->followings()->detach($user->id);

        $user->total_follower = $user->total_follower - 1;
        $user->save();
        auth()->user()->total_following = auth()->user()->total_following - 1;
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

    public function followers(user $user)
    {
        $followingList = $this->getFollowers($user);
        return view('users.follower',compact('followingList'));
    }

    public function getFollowers(User $user)
    {
        return DB::table('follows')
                    ->join('users', 'follower_id', '=', 'users.id')
                    ->where('following_id', $user->id)
                    ->get();              
    }

    public function joined(User $user)
    {
        $events =  DB::table('participants')
                    ->join('events', 'participants.event_id', '=', 'events.id')
                    ->where('participants.user_id', $user->id)
                    ->get();           
        return view('users.joined',compact('events'));
         
    }

}
