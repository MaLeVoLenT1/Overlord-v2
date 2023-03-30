<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('event_invites', function (Blueprint $table) {
            $table -> id();

            $table -> integer('calendar_event_id') -> unsigned();
            $table -> foreign('calendar_event_id') -> references('id') -> on('calendar_events') -> onDelete('cascade');

            $table -> integer('inviter_id') -> unsigned();
            $table -> foreign('inviter_id') -> references('id') -> on('profiles');

            $table -> integer('invitee_id') -> unsigned();
            $table -> foreign('invitee_id') -> references('id') -> on('profiles');

            $table -> boolean('accepted') -> default(false);
            $table -> boolean('declined') -> default(false);
            $table -> text('message');
            $table -> text('response');
            $table -> enum('rsvp', [
                'attending',
                'not attending',
                'probably attending',
                'late attendance',
                'probably not attending',
                'undecided'
            ]) -> default('undecided');

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
        Schema::dropIfExists('event_invites');
    }
}
