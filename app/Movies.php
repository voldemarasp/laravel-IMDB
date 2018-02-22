<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;

class Movies extends Model
{	
	public $timestamps = false;

	protected $fillable = [
        'name', 'description', 'user_id', 'category_id', 'year', 'rating', 'date'
    ];

    public function category() {
    	return $this->belongsTo(Categories::class);
    }
    public function user() {
    	return $this->belongsTo(User::class);
    }
    public function images() {
    return $this->morphMany(Images::class, 'imageable');
	}

	public function actors() {
		return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id');
	}

}
