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
}
