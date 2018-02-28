<?php

use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $path = 'http://api.themoviedb.org/3/movie/top_rated?api_key=3d666046197bc35f402080e836eaaa66';

            $json = json_decode(file_get_contents($path), true);



            foreach ($json['results'] as $seedas) {
            $year = substr($seedas['release_date'], 0, 4);
            DB::table('movies')->insert([
            'id' => $seedas['id'],
        	'name' => $seedas['title'],
        	'category_id' => $seedas['genre_ids'][0],
        	'year' => $year,
        	'user_id' => '2',
            'description' => $seedas['overview'],
            'rating' => $seedas['vote_average'],
            'date' => ''
            ]);
            }
    }
}