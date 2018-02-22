<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActorMovieConnect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           // Schema::table('actor_movie', function($table) {
           //  $table->integer('actor_id_id');
           //  $table->string('actor_id_type');
           //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actor_movie', function($table) {
            $table->dropColumn('actor_id_id');
            $table->dropColumn('actor_id_type');
        });
    }
}
