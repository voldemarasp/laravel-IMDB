<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('movies', function (Blueprint $movies) {
            $movies->increments('id');
            $movies->string('name', 255);
            $movies->unsignedInteger('category_id');
            $movies->unsignedInteger('user_id');
            $movies->integer('year');
            $movies->text('description');
            $movies->double('rating');
            $movies->unsignedInteger('date');
            $movies->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
