<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            /** Basic Information */
            $table -> id();
            $table -> string('username',15) -> unique();
            $table -> string('display_name', 15) -> nullable();
            $table -> string('email', 40) -> unique();
            $table -> timestamp('email_verified_at') -> nullable();
            $table -> string('password');
            $table -> string('first') -> nullable();
            $table -> string('last') -> nullable();
            $table -> date('birthdate') ->default('2017-01-01');
            $table -> string('token') -> nullable();
            $table -> string('avatar') -> nullable();
            $table -> enum('overlord_rank', [
                'guest',
                'member',
                'moderator',
                'administrator',
                'banned'
            ]) ->default('guest');

            /** Discord Information */
            $table -> bigInteger('discord_id') -> nullable();
            $table -> string('discord_username') -> nullable();
            $table -> integer('discord_discriminator') -> nullable();
            $table -> string('discord_verification_token') -> nullable();
            $table -> timestamp('discord_last_message_time') -> nullable();
            $table -> integer('discord_last_message_id') -> nullable();

            $table -> rememberToken();
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
        Schema::dropIfExists('users');
    }
}
