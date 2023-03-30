<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('discord_bots', function (Blueprint $table) {
            $table -> id();
            $table -> integer('owner_id') -> unsigned();
            $table -> string('owner_type');
            $table -> bigInteger('owner');
            $table -> bigInteger('owner_user_id');
            $table -> bigInteger('discord_id') -> unique();
            $table -> string('server_name');
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
        Schema::dropIfExists('discord_bots');
    }
}
