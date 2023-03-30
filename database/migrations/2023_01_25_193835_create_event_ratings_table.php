<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('event_ratings', function (Blueprint $table) {
            $table -> id();

            $table -> integer('calendar_event_id') -> unsigned();
            $table -> foreign('calendar_event_id') -> references('id') -> on('calendar_events') -> onDelete('cascade');

            $table -> integer('author_id') -> unsigned();
            $table -> foreign('author_id') -> references('id') -> on('profiles');

            $table -> text('comment');
            $table -> boolean('is_anonymous') -> default(false);
            $table -> boolean('is_approved') -> default(false);
            $table -> boolean('is_flagged') -> default(false);
            $table -> boolean('is_deleted') -> default(false);
            $table -> boolean('is_spam') -> default(false);
            $table -> boolean('needs_approval') -> default(false);
            $table -> boolean('is_private') -> default(false);
            $table -> boolean('is_public') -> default(false);
            $table -> boolean('has_comment') -> default(true);
            $table -> enum('rating', [ 'Five Stars', 'Four Stars', 'Three Stars', 'Two Stars', 'One Star' ]);

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_ratings');
    }
}
