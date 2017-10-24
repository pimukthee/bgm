<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'ranks', 'game_id', 'user_id');
    }
}