<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
            
$path = 'https://api.themoviedb.org/3/genre/movie/list?api_key=3d666046197bc35f402080e836eaaa66';
$json = json_decode(file_get_contents($path), true);

            foreach ($json['genres'] as $cat) {
            DB::table('categories')->insert([
            'id' => $cat['id'],
        	'name' => $cat['name'],
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius sem id velit scelerisque suscipit. Suspendisse pulvinar maximus mollis. Nullam purus orci, varius ut rhoncus in, dapibus eu nibh.',
        	'user_id' => '2'
            ]);
            }
    }
}
