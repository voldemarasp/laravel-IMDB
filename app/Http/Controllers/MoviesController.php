<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use App\Movies;
use App\Categories;
use Auth;
use App\Http\Requests\AddMovie;
use App\Http\Requests\StoreMovie;
use App\Images;
use App\Actor;
use Illuminate\Support\Facades\Storage;

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

    	$name = $request->input('name');
    	$category_id = $request->input('category_id');
    	$user_id = Auth::User()->id;
    	$year = $request->input('year');
    	$description = $request->input('description');
    	$rating = $request->input('rating');
		$date = date('Y-m-d');
		$actor_id = $request->input('actor_id');

    	$moviesAdd = Movies::create(['name' => $name, 'category_id' => $category_id, 'user_id' => $user_id, 'year' => $year, 'description' => $description, 'rating' => $rating, 'date' => $date]);

    	foreach ($file as $oneFile) {
    	$path = $oneFile->storePublicly('public/photo');
    	$filename = basename($path);
    	$moviesAdd->images()->create(['filename' => $filename, 'user_id' => $user_id]);
    	}

    	if (isset($actor_id)) {
    	$moviesAdd->actors()->attach($actor_id);
    	}
    	return redirect()->route('displayMovies');
    }

    public function display () {
    	
    	$movies = Movies::get();
    	$actors = Actor::get();
    	return view('movies.showMovies', ['movies' => $movies, 'actors' => $actors]);
    }


    public function inside($id) {
		$movies = Movies::where('id', $id)->get();
		return view('movies.insideShowMovies', ['movies' => $movies]);

    }

    public function edit($id) {
    	$movies = Movies::findOrFail($id);
    	$actors = Actor::get();
    	$cats = Categories::get(); 
    	return view('movies.editMovie', ['movies' => $movies, 'actors' => $actors, 'cats' => $cats]);
    }

    public function store(StoreMovie $request, $id) {
    	$user_id = Auth::User()->id;

    	$name = $request->input('name');
    	$category_id = $request->input('category_id');
    	$user_id = Auth::User()->id;
    	$year = $request->input('year');
    	$description = $request->input('description');
    	$rating = $request->input('rating');
		$date = date('Y-m-d');
		$actor_id = $request->input('actor_id');

    	$moviesAdd = Movies::where('id', $id)->update(['name' => $name, 'category_id' => $category_id, 'user_id' => $user_id, 'year' => $year, 'description' => $description, 'rating' => $rating, 'date' => $date]);
    	
    	if (null !== $request->file('photo')) {
		$moviesAdd = Movies::findOrFail($id);
		$fullImagesPath = $moviesAdd->images()->where('imageable_id', $id)->get();
		foreach ($fullImagesPath as $fullOnePath) {
		$fullPathImg = 'public/photo/' . $fullOnePath->filename;
		Storage::delete($fullPathImg);
		}

    	$file = $request->file('photo');
    	
    	$moviesAdd->images()->where('imageable_id', $id)->delete();
    	foreach ($file as $oneFile) {
    	$path = $oneFile->storePublicly('public/photo');
    	$filename = basename($path);
    	
    	$moviesAdd->images()->where('imageable_id', $id)->create(['filename' => $filename, 'user_id' => $user_id]);

    	}
    	}

    	if (isset($actor_id)) {
    	$moviesAdd->actors()->detach();
    	$moviesAdd->actors()->attach($actor_id);
    	}

    	return redirect()->route('displayMovies');

    }

    public function delete($id) {

    	$movies = Movies::findOrFail($id);

    	
    	$movies->actors()->detach();
    	$movie = Movies::where('id', $id)->delete();

		foreach ($movies->images as $image) {

    		$fullImagesPath = "public/photo/" . $image->filename;

    		Storage::delete($fullImagesPath);
    	}

    	$movies->images()->delete();

    	return redirect()->route('displayMovies');
    }
}
