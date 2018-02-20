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
            DB::table('comments')->insert([
        	'name' => 'My first movie',
        	'category_id' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat blanditiis sequi nihil voluptate eos cumque assumenda excepturi vitae quos officiis recusandae error quo nulla dolorum doloremque sed, repudiandae est,',
        	'date' => '2018-02-14',
        	'post_id' => '1'
        ]);
    }
}

            $movies->increments('id');
            $movies->string('name', 255);
            $movies->unsignedInteger('category_id');
            $movies->unsignedInteger('user_id');
            $movies->integer('year');
            $movies->text('description');
            $movies->double('rating');
            $movies->unsignedInteger('date');
            $movies->timestamps();