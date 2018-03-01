<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movies;
use App\Categories;
use App\Images;
use App\Http\Requests\Actors;
use App\Http\Requests\StoreActor;
use Auth;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
		public function form () {
			$movies = Movies::get();
			return view('actors.showActorsForm', ['movies' => $movies]);
		}

		public function add (Actors $request) {

			$name = $request->input('name');
			$birthday = $request->input('birthday');
			$deathday = $request->input('deathday');
			$user_id = Auth::User()->id;
			$movie_id = $request->input('movie_id');

			$file = $request->file('photo');

			$addActors = Actor::create(['name' => $name, 'bithday' => $birthday, 'deathday' => $deathday, 'user_id' => $user_id]);

		    foreach ($file as $oneFile) {
	    	$path = $oneFile->storePublicly('public/photo');
	    	$filename = basename($path);
	    	$addActors->images()->create(['filename' => $filename, 'user_id' => $user_id]);
	    	}

			

        	if (isset($movie_id)) {		
        	$addActors->movies()->attach($movie_id);	
        	}
			return redirect()->route('displayActors');

		}

		public function display() {
			$images = Images::take(10)->get();
			$actors = Actor::paginate(9);
			$movies = Movies::take(10)->get();
			$cats = Categories::take(10)->get();
			return view('actors.showActors', ['actors' => $actors, 'movies' => $movies, 'cats' => $cats, 'images' => $images]);

		}

		public function inside($id) {
			$actors = Actor::findOrFail($id);
			return view('actors.ActorInside', ['actors' => $actors]);
		}

		public function edit($id) {
			$actors = Actor::findOrFail($id);
			$movies = Movies::get();
			return view('actors.editActor', ['actors' => $actors, 'movies' => $movies]);
		}

		public function store(StoreActor $request, $id) {

			$name = $request->input('name');
			$birthday = $request->input('birthday');
			$deathday = $request->input('deathday');
			$user_id = Auth::User()->id;
			$movie_id = $request->input('movie_id');

	    	if (null !== $request->file('photo')) {
			$actorAdd = Actor::findOrFail($id);
			$fullImagesPath = $actorAdd->images()->where('imageable_id', $id)->get();
			foreach ($fullImagesPath as $fullOnePath) {
			$fullPathImg = 'public/photo/' . $fullOnePath->filename;
			Storage::delete($fullPathImg);
			}

	    	$file = $request->file('photo');
	    	
	    	$actorAdd->images()->where('imageable_id', $id)->delete();
	    	foreach ($file as $oneFile) {
	    	$path = $oneFile->storePublicly('public/photo');
	    	$filename = basename($path);
	    	
	    	$actorAdd->images()->where('imageable_id', $id)->create(['filename' => $filename, 'user_id' => $user_id]);

	    	}
	    	}

			$addActors = Actor::where('id', $id)->update(['name' => $name, 'bithday' => $birthday, 'deathday' => $deathday, 'user_id' => $user_id]);

        	if (isset($movie_id)) {		
        	$addActors->movies()->attach($movie_id);	
        	}
			return redirect()->route('displayActors');

		}

		public function delete ($id) {
		
    	$actors = Actor::findOrFail($id);

    	$actors->movies()->detach();
    	$actor = Actor::where('id', $id)->delete();

		foreach ($actors->images as $image) {

    		$fullImagesPath = "public/photo/" . $image->filename;

    		Storage::delete($fullImagesPath);
    	}

    	$actors->images()->delete();

    	return redirect()->route('displayActors');
		}
}