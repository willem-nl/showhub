<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('shows', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->integer('year');
            $table->string('first_aired');
            $table->string('first_aired_utc');
            $table->string('genre');
            $table->text('overview');
            $table->string('country', 100);
            $table->integer('runtime');
            $table->string('status', 20);
            $table->string('network', 50);
            $table->string('air_day', 20);
            $table->string('air_day_utc', 20);
            $table->string('air_time', 20);
            $table->string('air_time_utc', 20);
            $table->string('certification', 20);
            $table->string('imdb_id', 20);
            $table->string('tvdb_id', 20);
            $table->string('tvrage_id', 20);
            $table->string('poster');
            $table->text('images');
            $table->text('people');
            $table->string('last_update');
            $table->string('trakt_last_update');
            $table->text('trakt_url');
            $table->timestamps();
        });

        Schema::create('seasons', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('show_id')->unsigned();
            $table->integer('season');
            $table->integer('episodes');
            $table->text('trakt_url');
            $table->text('images');
            $table->timestamps();

            $table->foreign('show_id')->references('id')->on('shows')->onDeleted('cascade');
        });

        Schema::create('episodes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('episode_number');
            $table->integer('show_id')->unsigned();
            $table->integer('season_id')->unsigned();
            $table->string('imdb_id', 20);
            $table->string('tvdb_id', 20);
            $table->string('title');
            $table->text('overview');
            $table->string('first_aired');
            $table->string('first_aired_utc');
            $table->string('trakt_url');
            $table->text('images');
            $table->timestamps();

            $table->foreign('show_id')->references('id')->on('shows')->onDeleted('cascade');
            $table->foreign('season_id')->references('id')->on('seasons')->onDeleted('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('episodes');
        Schema::drop('seasons');
        Schema::drop('shows');
	}

}
