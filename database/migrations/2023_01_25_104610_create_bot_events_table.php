<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('bot_events', function (Blueprint $table) {
            $table -> id();
            $table -> integer('discord_bot_id') -> unsigned();
            $table -> foreign('discord_bot_id') -> references('id') -> on('discord_bots') -> onDelete('cascade');
            $table -> boolean("channel_create") -> default(false);
            $table -> boolean("channel_update") -> default(false);
            $table -> boolean("channel_delete") -> default(false);
            $table -> boolean("member_kick") -> default(false);
            $table -> boolean("member_ban_add") -> default(false);
            $table -> boolean("member_ban_remove") -> default(false);
            $table -> boolean("member_update") -> default(false);
            $table -> boolean("invite_create") -> default(false);
            $table -> boolean("invite_delete") -> default(false);
            $table -> boolean("message_delete") -> default(false);
            $table -> boolean("message_update") -> default(false);

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
        Schema::dropIfExists('bot_events');
    }
}
