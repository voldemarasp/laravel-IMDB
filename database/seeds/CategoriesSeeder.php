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
            DB::table('categories')->insert([
        	'name' => 'Veiksmo filmai',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius sem id velit scelerisque suscipit. Suspendisse pulvinar maximus mollis. Nullam purus orci, varius ut rhoncus in, dapibus eu nibh.',
        	'user_id' => '1'
        ]);
    }
}
