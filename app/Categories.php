<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{	
	public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'user_id'
    ];
}
