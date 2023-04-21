<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('crypto')->create('assets', function (Blueprint $table) {
            $table -> id();

            $table -> integer('association_id') -> unsigned();
            $table -> string('association_type');

            $table -> integer('profile_id') -> unsigned();
            $table -> foreign('profile_id') -> references('id') -> on('profiles') -> onDelete('cascade');

            $table -> integer('crypto_id') -> unsigned();
            $table -> foreign('crypto_id') -> references('id') -> on('cryptocurrencies');

            $table -> decimal('amount', 32, 16) -> default(0.0000000000000000);
            $table -> decimal('value', 32, 16) -> default(0.0000000000000000);

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
        Schema::dropIfExists('assets');
    }
}
