<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('calendar_events', function (Blueprint $table) {
            $table -> id();

            $table -> integer('calendar_id') -> unsigned();
            $table -> foreign('calendar_id') -> references('id') -> on('calendars') -> onDelete('cascade');

            $table -> integer('host_id') -> unsigned();
            $table -> foreign('host_id') -> references('id') -> on('profiles') -> onDelete('cascade');

            $table -> string('title');
            $table -> string('description') -> nullable();

            $table -> date('start_date');
            $table -> date('end_date');

            $table -> time('start_time');
            $table -> time('end_time');

            $table -> boolean('is_repeating') -> default(false);
            $table -> boolean('rsvp') -> default(false);
            $table -> boolean('all_day') -> default(false);
            $table -> boolean('all_week') -> default(false);
            $table -> boolean('all_month') -> default(false);
            $table -> longText('details') -> nullable();
            $table -> text('location') -> nullable();

            $table -> enum('repeat_day',[
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday',
                'None',
            ]) -> default('None');

            $table -> enum('priority',[
                'Optional',
                'Low',
                'Medium',
                'High',
                'Important'
            ]) -> default('Medium');

            $table -> enum('permissions', [
                'Private',
                'Leadership',
                'Membership',
                'World',
                'Public',
            ]) -> default('World');

            $table -> enum('status', [
                'Open',
                'Canceled',
                'Ended',
                'Prep',
                'Active',
                'Pending',
            ]) -> default('Open');

            $table -> enum('type', [
                'Crypto',
                'Profile',
                'Finances',
                'Organization',
                'Game',
                'Team',
                'Community',
                'In House',
                'Training',
                'Event',
                'Meeting',
                'Other',
            ]) -> default('Other');

            $table -> enum('timezone',[
                'UTC 0 EU',
                'UTC - 5 (EST)',
                'UTC - 6 (CST)',
                'UTC - 8 (PST)',
                'UTC + 3 (Moscow)',
                'UTC + 10 (OCX)',
                'UTC + 11 (AEDT)',
                'UTC + 8 (SEA)',
                'UTC + 9 (JST - Korea)',
                'UTC + 12 (NZ)',
                'UTC - 3 (Brazil)'
            ]) -> default('UTC 0 EU');

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
        Schema::dropIfExists('calendar_events');
    }
}
