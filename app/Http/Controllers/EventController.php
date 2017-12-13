<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\DeletedEvent;
use App\Event;
use App\User;
use App\RecentGame;
use App\Game;
use App\Rules\DateFormat;

class EventController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'fetch', 'showAtHome', 'participants']);
    }

    public function fetch()
    {
        $events = Event::all()->sortBy('start_date')->where('has_end', 0);
        $events = $this->zipNumberOfParticipant($events);
        $participatedEvents = $this->getParticipatedEvents();
        return view('events.list', compact('events', 'participatedEvents'));
    }

    public function show(Event $event)
    {
        $game = $event->game;
        $numberOfParticipant = $event->participants->count();
        $event->number = $numberOfParticipant;
        $participatedEvents = $this->getParticipatedEvents();

        return view('events.detail', compact('game','event', 'participatedEvents'));
    }

    public function create()
    {
        $gamenames = Game::all();
        return view('events.create', compact('gamenames'));
    }

    public function cancel(Event $event)
    {
        DB::table('participants')->where([['event_id', $event->id],['user_id', auth()->id()],])->delete();
        return redirect()->back();
    }
    
    public function store()
    {
        $this->validate(request(), [
            'game_id' => 'required',
            'name' => 'required',
            'start_date' => new DateFormat,
            'location' => 'required',
            'min_rank' => 'required'
        ]);

        $event = new Event(request(['name', 'start_date', 'location', 'min_rank','max_participants', 'description']));
        $event->game_id = request()->game_id;
        $event->max_participants = request()->max_participants;
        
        auth()->user()->createEvent($event);
        $this->join($event);
        
        return redirect()->home();
    }
    
    public function join(Event $event) 
    {
        $ranks = $this->getRank($event->game, auth()->id()); 
        if (count($ranks) > 0) $rank = $ranks[0];
        else $rank = 0;
        if ($rank >= $event->min_rank)
        {
            auth()->user()->join($event->id);
        }
        else 
        {
            session()->flash('logout_message', 'Your rank is not the requirement!');
        }
        return redirect()->home();
    }
    
    public function showAtHome()
    {
        $events= Event::all()->sortByDesc('start_date')->where('has_end', 0)->take(5);
        $events = $this->zipNumberOfParticipant($events);
        $participatedEvents = $this->getParticipatedEvents();
        return view('welcome', compact('events', 'participatedEvents'));
    }

    public function created()
    {
        if(auth()->check())
        {
            $events = Event::all()  ->sortBy('start_date')  
            ->where('user_id', auth()->id());
            $events = $this->zipNumberOfParticipant($events);
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
        $this->giveRank($event, $participants);
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

    public function participants(Event $event)
    {
        $users = $event->participants;
        return view('events.participants', compact('users'));
    }
    
    public function delete(Event $event)
    {
        $participants = $this->getParticipants($event);
        foreach ($participants as $participant)
        {
            $participant->notify(new DeletedEvent($event));
        }
        $event->delete();
        
        return redirect()->home();
    }


    private function getParticipatedEvents()
    {
        if (auth()->check())
        {
            return DB::table('participants')->where('user_id', auth()->user()->id)->pluck('event_id')->toArray();
        }
    }

    private function zipNumberOfParticipant($events)
    {
        foreach ($events as $event)
        {
            $numberOfParticipant = $event->participants->count();
            $event->number = $numberOfParticipant;
        }
        return $events;
    }

    private function getParticipants(Event $event)
    {
        return $event->participants()->get();
    }
    
    private function addRecentGames($event, $participants)
    {
        foreach ($participants as $participant)
        {
            $participant->recentGames()->attach($event, ['place' => request()->input($participant->id)]);
        }
    }
    
    private function giveRank($event, $participants)
    {
        $game = $event -> game;
        $numberOfParticipants = count($participants);
        foreach ($participants as $participant)
        {
            $score = (request()->input($participant->id) - 1 + $numberOfParticipants) * 1000;
            $hasRank = $participant->games->contains($game->id);
            if ($hasRank)
            {
                $participant->games()->updateExistingPivot($game->id, ['score'  => $score]);
            }
            else
            {
                $participant->games()->attach($game->id, ['score'  => $score]);
            }
        }
        return redirect()->home();
    }
    
    private function getRank($game, $user)
    {
        return DB::table('ranks')->where('game_id', $game)->where('user_id', $user)->pluck('score');
    }
}
