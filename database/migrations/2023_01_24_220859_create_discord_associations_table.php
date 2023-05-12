<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('discord_associations', function (Blueprint $table) {
            $table -> id();
            $table -> integer('user_id') -> unsigned();
            $table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');

            $table -> bigInteger('discord_id');
            $table -> string('username');
            $table -> string('display_name')-> nullable();
            $table -> string('discriminator');
            $table -> string('avatar')-> nullable();
            $table -> timestamp('last_message_time')-> nullable();
            $table -> integer('last_message_id')-> nullable();
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
        Schema::dropIfExists('discord_associations');
    }
}
