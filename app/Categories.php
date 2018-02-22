<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movies;

class Categories extends Model
{	
	public $timestamps = false;
	protected $table = 'categories';
    protected $fillable = [
        'name', 'description', 'user_id', 'category_id'
    ];

    public function movies() {
    return $this->hasMany(Movies::class, 'category_id');
	}
}
