<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_information', function (Blueprint $table) {
            $table->id();
            $table -> string('author', 15)->unique();
            $table -> string('description')->nullable();
            $table -> boolean('is_active')->default(true);
            $table -> string('icon')->default('/images/logos/overlord/favicon.png');
            $table -> enum('pages', [
                'front',
                'back',
                'personal',
                'games',
                'crypto',
                'all',
                'community',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_information');
    }
}
