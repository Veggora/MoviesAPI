<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'director', 'genre', 'duration_in_minutes', 'year', 'rating', 'country'
    ];
}
