<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorMovie extends Model
{	
	public $timestamps = false;
	protected $table = 'actor_movie';
	protected $fillable = ['actor_id', 'movie_id'];

	public function actorBelongs() {
		return $this->morphMany(Actor::class);
	}
}
