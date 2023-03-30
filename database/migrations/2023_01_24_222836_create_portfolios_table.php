<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('crypto')->create('portfolios', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedInteger('profile_id');
            $table -> foreign('profile_id') -> references('id') -> on('profiles');
            $table -> string('name');
            $table -> string('description');

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
        Schema::dropIfExists('portfolios');
    }
}
