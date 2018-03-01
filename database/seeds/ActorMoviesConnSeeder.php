<?php

use Illuminate\Database\Seeder;
use App\Movies;
use App\Actor;

class ActorMoviesConnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$movies = Movies::get();

    	foreach ($movies as $movie) {

    		$path = 'https://api.themoviedb.org/3/movie/'. $movie->id .'/credits?api_key=3d666046197bc35f402080e836eaaa66';
    		$json = json_decode(file_get_contents($path), true);

    		foreach ($json['cast'] as $seedas) {

    			$actors = Actor::where('actor_api_id', $seedas['id'])->get();

    			foreach ($actors as $actor) {

    				$moviesAdd = Movies::findOrFail($movie->id);
    				$moviesAdd->actors()->attach($actor->id);
    			}
    		}
    	}

    }
}
