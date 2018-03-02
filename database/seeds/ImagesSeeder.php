<?php

use Illuminate\Database\Seeder;
use App\Movies;
use Illuminate\Support\Facades\Storage;

class ImagesSeeder extends Seeder
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
    	$moviesAdd = Movies::findOrFail($movie->id);
        $images = 'https://api.themoviedb.org/3/movie/'. $movie->id . '/images?api_key=3d666046197bc35f402080e836eaaa66';
		$jsonImages = json_decode(file_get_contents($images), true); 

		    foreach ($jsonImages['backdrops'] as $seedas) {
            $getFullUrl = 'http://image.tmdb.org/t/p/w300/' . $seedas['file_path'];
            $downloadImage = file_get_contents($getFullUrl);
            $filename = md5($seedas['file_path']);
            $ext = pathinfo($getFullUrl, PATHINFO_EXTENSION);
            $fullFileName = $filename .".". $ext;

            Storage::disk('local')->put('public/photo/actors/' . $fullFileName, $downloadImage);
            $moviesAdd = Movies::findOrFail($actor->id);

			$moviesAdd->images()->create(['filename' => $seedas['file_path'], 'user_id' => '2']);

            }
        }
    }
}