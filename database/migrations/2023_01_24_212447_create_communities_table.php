<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('communities', function (Blueprint $table) {
            $table -> id();
            $table -> integer('owner_id') -> unsigned();
            $table -> string('owner_type');

            $table -> string('discord_id') -> nullable();
            $table -> foreign('discord_id') -> references('id') -> on('discord_bots');

            $table -> string('channel_id') -> nullable();
            $table -> foreign('channel_id') -> references('id') -> on('bot_channels');

            $table -> string('name');
            $table -> string('description') -> nullable();
            $table -> string('ticker') -> nullable();
            $table -> integer('member_count') -> nullable();
            $table -> string('website') -> nullable();
            $table -> string('logo') -> nullable();
            $table -> string('banner') -> nullable();
            $table -> string('color') -> nullable();

            $table -> enum('synonym', [
                'community',
                'alliance',
                'coalition',
                'confederation',
                'federation',
                'league',
                'union',
            ]) -> default('community');

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
        Schema::dropIfExists('communities');
    }
}
