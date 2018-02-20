<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	protected $fillable = [
        'user_id', 'filename', 'imageable_id', 'imageable_type'
    ];

    public function imagesBelongs() {
    	return $this->morphMany(Movies::class);
    }
}
