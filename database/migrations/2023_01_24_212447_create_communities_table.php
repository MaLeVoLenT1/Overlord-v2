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

            $table -> string('name');
            $table -> string('description') -> nullable();
            $table -> string('ticker') -> nullable();
            $table -> integer('member_count') -> nullable();

            $table -> string('discord_id') -> nullable();
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
