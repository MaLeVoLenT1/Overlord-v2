<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('header_keywords', function (Blueprint $table) {
            $table->id();
            $table -> string('name',15) -> unique();
            $table -> boolean('is_active');
            $table -> timestamps();
            $table -> enum('pages', [
                'community',
                'games',
                'crypto',
                'all',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_keywords');
    }
}
