<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function owner() {
        return $this->belongsTo('App\User');
    }
}
