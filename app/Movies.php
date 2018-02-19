<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;

class Movies extends Model
{
    public function category() {
    	return $this->belongsTo(Categories::class);
    }
    public function user() {
    	return $this->belongsTo(User::class);
    }
}
