<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotEmojisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('bot_emojis', function (Blueprint $table) {
            $table -> id();
            $table -> integer('discord_bot_id') -> unsigned();
            $table -> foreign('discord_bot_id') -> references('id') -> on('discord_bots') -> onDelete('cascade');
            $table -> string('emoji_id');
            $table -> string('emoji_name');
            $table -> string('type');
            $table -> string('category');
            $table -> string('sub_category');
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
        Schema::dropIfExists('bot_emojis');
    }
}
