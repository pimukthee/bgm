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

    public function participatedEvents()
    {
        return $this->belongsToMany(Event::class, 'participants', 'user_id', 'event_id');
    }

    public function join($eventId)
    {
        $this->participatedEvents()->attach($eventId);
    }

    public function createEvent(Event $event)
    {
        $this->events()->save($event);
    }
}
