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
            $table->string('slug')->unique();
            $table->string('title');
            $table->integer('year')->nullable();
            $table->string('first_aired');
            $table->string('first_aired_utc');
            $table->string('genre')->nullable();
            $table->text('overview')->nullable();
            $table->string('country', 100)->nullable();
            $table->integer('runtime')->nullable();
            $table->string('status', 20)->nullable();
            $table->string('network', 50)->nullable();
            $table->string('air_day', 20)->nullable();
            $table->string('air_day_utc', 20)->nullable();
            $table->string('air_time', 20)->nullable();
            $table->string('air_time_utc', 20)->nullable();
            $table->string('certification', 20)->nullable();
            $table->string('imdb_id', 20)->nullable();
            $table->string('tvdb_id', 20);
            $table->string('tvrage_id', 20)->nullable();
            $table->string('poster')->nullable();
            $table->text('images')->nullable();
            $table->text('people')->nullable();
            $table->string('last_update')->nullable();
            $table->string('trakt_last_update')->nullable();
            $table->text('trakt_url');
            $table->timestamps();
        });

        Schema::create('seasons', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('show_id')->unsigned();
            $table->integer('season');
            $table->integer('episodes')->nullable();
            $table->text('trakt_url');
            $table->text('images')->nullable();
            $table->timestamps();

            $table->foreign('show_id')->references('id')->on('shows')->onDeleted('cascade');
        });

        Schema::create('episodes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('episode_number');
            $table->integer('show_id')->unsigned();
            $table->integer('season_id')->unsigned();
            $table->string('imdb_id', 20)->nullable();
            $table->string('tvdb_id', 20);
            $table->string('title')->nullable();
            $table->text('overview')->nullable();
            $table->string('first_aired')->nullable();
            $table->string('first_aired_utc')->nullable();
            $table->string('trakt_url');
            $table->text('images')->nullable();
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
