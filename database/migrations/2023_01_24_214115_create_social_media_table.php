<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('social_media', function (Blueprint $table) {
            $table -> id();
            $table -> integer('profile_id') -> unsigned();
            $table -> foreign('profile_id') -> references('id') -> on('profiles');

            $table -> string('name');
            $table -> string('url');
            $table -> string('icon');
            $table -> enum('type', [
                'facebook',
                'youtube',
                'twitter',
                'instagram',
                'twitch',
                'reddit',
                'github',
                'steam',
                'pinterest',
                'linkedin',
                'snapchat',
                'tumblr',
                'vimeo',
            ]);

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
        Schema::dropIfExists('social_media');
    }
}
