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

            $table -> integer('owner_id') -> unsigned();
            $table -> string('owner_type');

            $table -> string('name');
            $table -> string('description');

            $table -> integer('balance') -> unsigned();
            $table -> integer('profit') -> unsigned();
            $table -> integer('loss') -> unsigned();
            $table -> integer('total') -> unsigned();
            $table -> integer('total_invested') -> unsigned();
            $table -> integer('total_withdrawn') -> unsigned();
            $table -> integer('total_profit') -> unsigned();
            $table -> integer('total_fees') -> unsigned();
            $table -> integer('number_of_assets') -> unsigned();
            $table -> integer('number_of_transactions') -> unsigned();
            $table -> integer('number_of_withdrawals') -> unsigned();
            $table -> integer('number_of_deposits') -> unsigned();
            $table -> integer('number_of_trades') -> unsigned();

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
