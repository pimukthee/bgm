<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\RecentGame;

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
    
    public function showAtHome()
    {
        $events= Event::all() ->sortByDesc('start_date')->take(5);
        $participatedEvents = $this->getParticipatedEvents();
        return view('welcome', compact('events', 'participatedEvents'));
    }
    
    private function getParticipatedEvents()
    {
        if (auth()->check())
        {
            return DB::table('participants')->where('user_id', auth()->user()->id)->pluck('event_id')->toArray();
        }
    }

    public function created()
    {
        if(auth()->check())
        {
        $events = Event::all()  ->sortBy('start_date')  
                                ->where('user_id', auth()->id());
        $participatedEvents = $this->getParticipatedEvents();
        return view('events.created', compact('events', 'participatedEvents'));
        }
        else{
            return redirect()->home();
        }
    }

    public function end(Event $event)
    {
        $event->has_end = true;
        $event->save();
        $participants = $this->getParticipants($event);
        $this->addRecentGames($event, $participants);
        return redirect()->home();
    }
    public function rank(Event $event)
    {
        $users = DB::table('participants')
                ->join('users', 'participants.user_id', '=' , 'users.id')
                ->where('event_id', $event->id)
                ->get();
        $count = DB::table('participants')
                ->where('event_id', $event->id)
                ->count();  

       return view('events.rank', compact('users', 'count', 'event'));
    }
    
    public function recent()
    {
        if(auth()->check())
        {
            $recentGames = DB::table('recent_games')
                            ->join('events', 'recent_games.event_id', '=', 'events.id')
                            ->where('has_end', '=', '1')
                            ->get();

            $participatedEvents = $this->getParticipatedEvents();
            return view('events.recent', compact('recentGames', 'participatedEvents'));
        }
        else
        {
            return redirect()->home();
        }
    }
            

    private function getParticipants(Event $event)
    {
        return $event->participants()->get();
    }

    private function addRecentGames($event, $participants)
    {
        foreach ($participants as $participant)
        {
            $participant->recentGames()->attach($event, ['place' => request()->input($participant->name)]);
        }
    }
}
