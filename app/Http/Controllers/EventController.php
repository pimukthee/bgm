<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
use App\User;

class EventController extends Controller
{
    
    public function fetch()
    {
        $events = Event::all();
        $participatedEvents = $this->getParticipatedEvents();
        return view('events.list', compact('events', 'participatedEvents'));
    }
    
    public function create()
    {
        return view('events.create');
    }
    
    public function store()
    {
        $event = new Event(request(['name', 'start_date', 'location', 'min_rank', 'description']));

        auth()->user()->createEvent($event);
        $this->join($event);
        
        return redirect()->home();
    }
    
    public function join(Event $event) 
    {
        auth()->user()->join($event->id);
        
        return redirect()->home();
    }
    
    
    private function getParticipatedEvents()
    {
        if (auth()->check())
        {
            return DB::table('participants')->where('user_id', auth()->user()->id)->pluck('event_id')->toArray();
        }
    }
}
