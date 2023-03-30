<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table -> id();

            $table -> integer('commentable_id') -> unsigned();
            $table -> string('commentable_type');
            $table -> integer('author_id') -> unsigned();
            $table -> foreign('author_id') -> references('id') -> on('profiles');

            $table -> text('body');
            $table -> boolean('is_anonymous') -> default(false);
            $table -> boolean('is_approved') -> default(false);
            $table -> boolean('is_flagged') -> default(false);
            $table -> boolean('is_deleted') -> default(false);
            $table -> boolean('is_spam') -> default(false);
            $table -> boolean('needs_approval') -> default(false);
            $table -> boolean('is_private') -> default(false);
            $table -> boolean('is_public') -> default(false);

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
        Schema::dropIfExists('comments');
    }
}
