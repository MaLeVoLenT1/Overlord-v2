<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /** Run the migrations.
     * @return void  */
    public function up()
    {
        Schema::connection('mysql')->create('blogs', function (Blueprint $table) {
            $table -> id();
            $table -> integer('association_id') -> unsigned();
            $table -> string('association_type');
            $table -> string('name');
            $table -> string('slug') -> unique();
            $table -> integer('author_id') -> unsigned();
            $table -> foreign('author_id') -> references('id') -> on('profiles') -> onDelete('cascade');
            $table -> string('description') -> nullable();
            $table -> string('keywords') -> nullable();
            $table -> boolean('is_active') -> default(true);
            $table -> boolean('is_featured') -> default(false);
            $table -> boolean('is_pinned') -> default(false);
            $table -> boolean('is_sponsored') -> default(false);
            $table -> boolean('is_published') -> default(false);

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
        Schema::dropIfExists('blogs');
    }
}
