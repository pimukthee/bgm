<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function fetchEvents() {
        $events = Event::all();
        return view('welcome', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }
}
