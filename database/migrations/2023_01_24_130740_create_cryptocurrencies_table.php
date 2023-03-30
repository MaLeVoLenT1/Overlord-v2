<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptocurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('crypto')->create('cryptocurrencies', function (Blueprint $table) {
            $table -> id();
            $table -> string('gecko_id');
            $table -> string('symbol');
            $table -> string('name');
            $table -> string('image_url');
            $table -> string('description');
            $table -> string('blockchain_explorer_url');
            $table -> string('blockchain_explorer_api_url');

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
        Schema::dropIfExists('cryptocurrencies');
    }
}
