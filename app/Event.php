<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'start_date', 'location', 'min_rank', 'description'];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'event_id', 'user_id');
    }

    public function participatedUser()
    {
        return $this->belongsToMany(User::class, 'recent_games', 'event_id', 'user_id');
    }
}
