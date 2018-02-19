<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use App\Movies;
use App\Categories;
use Auth;
use App\Http\Requests\AddMovie;
use App\Images;

class MoviesController extends Controller
{
	public function form () {
		$cats = Categories::get();
		return view('movies.showMoviesForm', ['cats' => $cats]);
	}

    public function add (AddMovie $request) {

    	$user_id = Auth::User()->id;

    	$file = $request->file('photo');
    	$path = $file->storePublicly('photo');
    	$filename = basename($path);


    	$name = $_POST['name'];
    	$category_id = $_POST['category_id'];
    	$user_id = Auth::User()->id;
    	$year = $_POST['year'];
    	$description = $_POST['description'];
    	$rating = $_POST['rating'];
		$date = date('Y-m-d');

    	$posts = Movies::insert(['name' => $name, 'category_id' => $category_id, 'user_id' => $user_id, 'year' => $year, 'description' => $description, 'rating' => $rating, 'date' => $date]);


    	$getMovie_id = Movies::orderBy('id', 'desc')->limit(1)->get();
		$movie_id = $getMovie_id[0]->id;


    	$images = Images::insert(['filename' => $filename, 'user_id' => $user_id, 'imageable_id' => $movie_id]);

    	$movies = Movies::get();

    	return view('movies.showMovies', ['movies' => $movies]);
    }

    public function display () {
    	
    	$movies = Movies::get();

    	return view('movies.showMovies', ['movies' => $movies]);
    }
}
