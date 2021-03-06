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
		$mov = Movies::get();

		$path = 'http://api.themoviedb.org/3/movie/top_rated?api_key=3d666046197bc35f402080e836eaaa66';
		$json = json_decode(file_get_contents($path), true); 


		$images = Images::take(10)->get();
		$actors = Actor::take(10)->get();
		$movies = Movies::paginate(9);
		$cats = Categories::take(10)->get();
		return view('movies.showMovies', ['movies' => $movies, 'actors' => $actors, 'cats' => $cats, 'images' => $images, 'json' => $json['results']]);
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


		if (!empty($request->input('photoCheckas'))) {

			$moviesAdd = Movies::findOrFail($id);
			$imagesCheckboxResult = $request->input('photoCheckas');
			foreach ($imagesCheckboxResult as $imageCheckboxResult) {

				$fullImagesPath = $moviesAdd->images()->where('id', $imageCheckboxResult)->get();
				foreach ($fullImagesPath as $fullOnePath) {
					$fullPathImg = 'public/photo/' . $fullOnePath->filename;
					Storage::delete($fullPathImg);
				}

				$moviesAdd->images()->where('id', $imageCheckboxResult)->delete();
			}


		}


		if (null !== $request->file('photo')) {

			$moviesAdd = Movies::findOrFail($id);
			$file = $request->file('photo');

			foreach ($file as $oneFile) {
				$path = $oneFile->storePublicly('public/photo');
				$filename = basename($path);

				$moviesAdd->images()->where('imageable_id', $id)->create(['filename' => $filename, 'user_id' => $user_id]);

			}
		}

		if (isset($actor_id)) {
			$moviesAdd = Movies::findOrFail($id);
			$moviesAdd->actors()->detach();
			$moviesAdd->actors()->attach($actor_id);
		}

		$selectFeaturedImage = $request->input('selectFeaturedImage');
		$moviesAdd->images()->where('id', $selectFeaturedImage)->update(['featured_image' => 'yes']);

		return redirect()->route('insideMovies', $id);

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

	public function apisingle($id) {

		$movies = Movies::get();

		foreach ($movies as $movie) {

			$path = 'https://api.themoviedb.org/3/movie/'. $movie->id .'/credits?api_key=3d666046197bc35f402080e836eaaa66';
			$json = json_decode(file_get_contents($path), true);

			foreach ($json['cast'] as $seedas) {

				$actors = Actor::where('actor_api_id', $seedas['id'])->get();
				dd($actors);
				$moviesAdd = Movies::findOrFail($movie->id);
				$moviesAdd->actors()->attach($actors->id);
			}
		}
	}
}