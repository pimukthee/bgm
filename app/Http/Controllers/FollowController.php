<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        return redirect()->home();
        $follow = new Follow;
        $follow->follower_id = auth()->user()->id;
        $follow->following_id = $user->id;
        $follow.save();
    }
}
