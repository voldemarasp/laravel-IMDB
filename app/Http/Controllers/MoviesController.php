<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use App\Movies;
use App\Categories;
use Auth;
use App\Http\Requests\AddMovie;
use App\Images;
use App\Actor;

class MoviesController extends Controller
{
	public function form () {
		$cats = Categories::get();
		$actors = Actor::get();
		return view('movies.showMoviesForm', ['cats' => $cats, 'actors' => $actors]);
	}

    public function add (AddMovie $request) {

    	$user_id = Auth::User()->id;

    	$file = $request->file('photo');
    	$path = $file->storePublicly('public/photo');
    	$filename = basename($path);


    	$name = $request->input('name');
    	$category_id = $request->input('category_id');
    	$user_id = Auth::User()->id;
    	$year = $request->input('year');
    	$description = $request->input('description');
    	$rating = $request->input('rating');
		$date = date('Y-m-d');
		$actor_id = $request->input('actor_id');

    	$moviesAdd = Movies::create(['name' => $name, 'category_id' => $category_id, 'user_id' => $user_id, 'year' => $year, 'description' => $description, 'rating' => $rating, 'date' => $date]);
    	
    	$moviesAdd->images()->create(['filename' => $filename, 'user_id' => $user_id]);
    	if (isset($actor_id)) {
    	$moviesAdd->actors()->attach($actor_id);
    	}
    	return redirect()->route('displayMovies');
    }

    public function display () {
    	
    	$movies = Movies::get();

    	return view('movies.showMovies', ['movies' => $movies]);
    }


    public function inside($id) {
		$movies = Movies::where('id', $id)->get();
		return view('movies.insideShowMovies', ['movies' => $movies]);

    }
}
