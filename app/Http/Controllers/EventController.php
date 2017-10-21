<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;

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

    public function store()
    {
        auth() -> user() -> createEvent(
            new Event(request(['name', 'start_date', 'location', 'min_rank', 'description']))
        );

        return redirect() -> home();
    }
}
