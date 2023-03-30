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
        Schema::connection('mysql')->create('users', function (Blueprint $table) {
            /** Basic Information */
            $table -> id();
            $table -> string('username',15) -> unique();
            $table -> string('display_name', 15) -> nullable();
            $table -> string('email', 40) -> unique();
            $table -> timestamp('email_verified_at') -> nullable();
            $table -> string('password');
            $table -> string('token') -> nullable();
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
