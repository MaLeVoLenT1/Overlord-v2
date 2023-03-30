<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('discord_guests', function (Blueprint $table) {
            $table -> id();

            $table -> integer('discord_bot_id') -> unsigned();
            $table -> foreign('discord_bot_id') -> references('id') -> on('discord_bots') -> onDelete('cascade');

            $table -> integer('profile_id') -> unsigned() -> nullable();
            $table -> foreign('profile_id') -> references('id') -> on('profiles');

            $table -> string('display_name') -> nullable();
            $table -> bigInteger('discord_id');
            $table -> string('discord_username');
            $table -> integer('discord_discriminator');

            $table -> bigInteger('last_message') -> nullable();
            $table -> timestamp('last_message_updated_at') -> nullable();
            $table -> dateTime('joined') -> nullable();
            $table -> string('rank') -> nullable();

            $table -> dateTime('left') -> nullable();
            $table -> dateTime('kicked') -> nullable();

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
        Schema::dropIfExists('discord_guests');
    }
}
