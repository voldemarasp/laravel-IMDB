<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Images;

class Actor extends Model
{
    protected $fillable = ['name', 'bithday', 'deathday', 'user_id', 'filename'];

    public function images() {
    return $this->morphMany(Images::class, 'imageable');
	}

}