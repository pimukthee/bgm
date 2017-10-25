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
        if(auth()->check())
        {
        $events = Event::all() ->sortBy('start_date');
        $participatedEvents = $this->getParticipatedEvents();
        return view('events.list', compact('events', 'participatedEvents'));
        }
        else{
            return redirect()->home();
        }
    }
    
    public function create()
    {
        return view('events.create');
    }

    public function cancel(Event $event)
    {
        DB::table('participants')->where([['event_id', $event->id],['user_id', auth()->id()],])->delete();
        return redirect()->back();
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
