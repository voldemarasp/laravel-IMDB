<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movies;
use App\Http\Requests\Actors;
use Auth;

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
		    $path = $file->storePublicly('public/photo');
		    $filename = basename($path);

			$addActors = Actor::create(['name' => $name, 'bithday' => $birthday, 'deathday' => $deathday, 'user_id' => $user_id]);
			$addActors->images()->create(['filename' => $filename, 'user_id' => $user_id]);
        	if (isset($movie_id)) {		
        	$addActors->movies()->attach($movie_id);	
        	}
			return redirect()->route('displayActors');

		}

		public function display() {

			$actors = Actor::get();
			return view('actors.showActors', ['actors' => $actors]);

		}

		public function inside($id) {
			$actors = Actor::where('id', $id)->get();
			return view('actors.ActorInside', ['actors' => $actors]);
		}
}