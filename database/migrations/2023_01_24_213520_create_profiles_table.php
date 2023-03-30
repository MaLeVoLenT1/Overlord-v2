<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('profiles', function (Blueprint $table) {
            $table -> id();
            $table -> string('first') -> nullable();
            $table -> string('last') -> nullable();
            $table -> date('birthdate') -> default('2017-01-01');
            $table -> string('avatar') -> nullable();
            $table -> enum('overlord_rank', [
                'guest',
                'member',
                'moderator',
                'administrator',
                'banned'
            ]) -> default('guest');
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
        Schema::dropIfExists('profiles');
    }
}
