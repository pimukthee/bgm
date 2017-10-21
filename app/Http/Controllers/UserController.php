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
}
