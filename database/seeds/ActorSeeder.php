<?php

use Illuminate\Database\Seeder;
use App\Actor;
use Illuminate\Support\Facades\Storage;
use App\Movies;

class ActorSeeder extends Seeder
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

		$actorPath = 'https://api.themoviedb.org/3/person/'. $seedas['id'] .'?api_key=3d666046197bc35f402080e836eaaa66';
        $actorJson = json_decode(file_get_contents($actorPath), true);



        if (empty($actorJson['deathday'])) {
        	$deathday = $actorJson['birthday'];
        } else {
        	$deathday = $actorJson['deathday'];
        }

        DB::table('actors')->insert([
    	'name' => $actorJson['name'],
    	'bithday' => $actorJson['birthday'],
    	'deathday' => $deathday,
    	'user_id' => '2',
    	'actor_api_id' => $seedas['id']
        ]);
        }
    }
    }
}
