<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password','about_me'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'ranks', 'user_id', 'game_id');
    }

    public function participatedEvents()
    {
        return $this->belongsToMany(Event::class, 'participants', 'user_id', 'event_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }

    public function join($eventId)
    {
        $this->participatedEvents()->attach($eventId);
    }

    public function createEvent(Event $event)
    {
        $this->events()->save($event);
    }

    public function recentGame()
    {
        return $this->belongsToMany(Event::class,'recent_games','user_id','event_id');
    }
}
