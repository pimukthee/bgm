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
}
