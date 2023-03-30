<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('event_organizers', function (Blueprint $table) {
            $table -> id();

            $table -> integer('calendar_event_id') -> unsigned();
            $table -> foreign('calendar_event_id') -> references('id') -> on('calendar_events') -> onDelete('cascade');

            $table -> integer('organizer_id') -> unsigned();
            $table -> foreign('organizer_id') -> references('id') -> on('profiles');

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
        Schema::dropIfExists('event_organizers');
    }
}
