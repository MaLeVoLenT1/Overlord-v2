<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('bot_commands', function (Blueprint $table) {
            $table -> id();

            $table -> integer('discord_bot_id') -> unsigned();
            $table -> foreign('discord_bot_id') -> references('id') -> on('discord_bots') -> onDelete('cascade');
            $table -> string('command');
            $table -> string('description');
            $table -> boolean('enabled') -> default(true);
            $table -> string('response');
            $table -> enum('type', ['text', 'embed', 'file', 'crypto', 'default']) -> default('default');

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
        Schema::dropIfExists('bot_commands');
    }
}
