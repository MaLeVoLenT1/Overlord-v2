<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('discord_users', function (Blueprint $table) {
            $table -> id();
            $table -> bigInteger('discord_id');
            $table -> string('discord_username');
            $table -> string('display_name') -> nullable();
            $table -> string('discord_discriminator');
            $table -> string('email') -> nullable();
            $table -> timestamp('email_verified_at') -> nullable();
            $table -> timestamp('discord_last_message_time') -> nullable();
            $table -> integer('discord_last_message_id') -> nullable();
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
        Schema::dropIfExists('discord_users');
    }
}
