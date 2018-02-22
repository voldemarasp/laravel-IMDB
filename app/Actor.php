<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Images;

class Actor extends Model
{
	public $timestamps = false;
    protected $fillable = ['name', 'bithday', 'deathday', 'user_id', 'filename', 'movie_id'];

    public function images() {
    return $this->morphMany(Images::class, 'imageable');
	}

	public function movies() {
		return $this->belongsToMany(Movies::class, 'actor_movie', 'actor_id', 'movie_id');
	}

}