<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('bot_channels', function (Blueprint $table) {
            $table -> id();
            $table -> integer('discord_bot_id') -> unsigned();
            $table -> foreign('discord_bot_id') -> references('id') -> on('discord_bots') -> onDelete('cascade');
            $table -> string('name') -> nullable();
            $table -> bigInteger('channel_id') -> nullable();
            $table -> enum('type', [
                'administration',
                'moderation',
                'guests',
                'teams',
                'members',
                'raids',
                'announcements',
                'welcome',
                'crypto',
                'bot',
                'other',
            ]) -> default('bot');
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
        Schema::dropIfExists('bot_channels');
    }
}
