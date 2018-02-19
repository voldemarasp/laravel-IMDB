<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JoinActorMovieToActors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actor_movie', function (Blueprint $table) {
            $table->foreign('actor_id')->references('id')->on('actors');
            $table->foreign('movie_id')->references('id')->on('movies');
        });

        Schema::table('movies', function (Blueprint $movies) {
            $movies->foreign('category_id')->references('id')->on('categories');
            $movies->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('categories', function (Blueprint $categories) {
            $categories->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('images', function (Blueprint $images) {
            $images->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('actors', function (Blueprint $actors) {
            $actors->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('actor_movie', function (Blueprint $table) {
            $table->dropForeign(['actor_id']);
            $table->dropForeign(['movie_id']);
        });

        Schema::table('movies', function (Blueprint $movies) {
            $movies->dropForeign(['category_id']);
            $movies->dropForeign(['user_id']);
        });

        Schema::table('categories', function (Blueprint $categories) {
            $categories->dropForeign(['user_id']);
        });

        Schema::table('images', function (Blueprint $images) {
            $images->dropForeign(['user_id']);
        });

        Schema::table('actors', function (Blueprint $actors) {
            $actors->dropForeign(['user_id']);
        });
    }
}
