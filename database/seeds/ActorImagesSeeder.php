<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Actor;

class ActorImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$actors = Actor::get();
    	
    	
    	foreach ($actors as $actor) {

        $images = 'https://api.themoviedb.org/3/person/'. $actor->actor_api_id . '/images?api_key=3d666046197bc35f402080e836eaaa66';

		$jsonImages = json_decode(file_get_contents($images), true); 

		    foreach ($jsonImages['profiles'] as $seedas) {
		    $getFullUrl = 'http://image.tmdb.org/t/p/w300/' . $seedas['file_path'];
		    $downloadImage = file_get_contents($getFullUrl);
		    $filename = md5($seedas['file_path']);
		    $ext = pathinfo($getFullUrl, PATHINFO_EXTENSION);
		    $fullFileName = $filename .".". $ext;

            Storage::disk('local')->put('public/photo/actors/' . $fullFileName, $downloadImage);
            $actorsAdd = Actor::findOrFail($actor->id);
			$actorsAdd->images()->create(['filename' => $fullFileName, 'user_id' => '2']);

            }
        }
    }
}
