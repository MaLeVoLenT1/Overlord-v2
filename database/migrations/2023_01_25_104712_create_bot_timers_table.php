<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotTimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('bot_timers', function (Blueprint $table) {
            $table -> id();
            $table -> integer('discord_bot_id') -> unsigned();
            $table -> foreign('discord_bot_id') -> references('id') -> on('discord_bots') -> onDelete('cascade');

            $table -> integer("timer") -> default(60);
            $table -> string("name") -> unique();
            $table -> string("description") -> nullable();
            $table -> string("command") -> nullable();
            $table -> boolean("enabled") -> default(true);

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
        Schema::dropIfExists('bot_timers');
    }
}
