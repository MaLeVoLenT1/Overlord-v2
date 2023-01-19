<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderViewportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_viewports', function (Blueprint $table) {
            $table->id();
            $table->string('property');
            $table -> boolean('is_active');
            $table -> timestamps();
            $table -> enum('pages', [
                'front',
                'back',
                'hybrid',
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
        Schema::dropIfExists('header_viewports');
    }
}
