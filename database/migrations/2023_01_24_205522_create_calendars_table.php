<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('calendars', function (Blueprint $table) {
            $table -> id();
            $table -> string('name');
            $table -> string('description');
            $table -> string('color');

            $table -> boolean('is_public');
            $table -> boolean('is_default');
            $table -> boolean('is_active');

            $table -> integer('owner_id') -> unsigned();
            $table -> string('owner_type');

            $table -> enum('priority', [
                'Optional',
                'Low',
                'Medium',
                'High',
                'Important'
            ]) -> default('Medium');

            $table -> enum('permissions', [
                'Private',
                'Administrators',
                'Members',
                'Global',
                'Public',
            ]) -> default('Global');

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
            ]) -> default('UTC - 5 (EST)');

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
        Schema::dropIfExists('calendars');
    }
}
