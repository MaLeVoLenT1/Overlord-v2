<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table -> id();
            $table -> integer('association_id') -> unsigned();
            $table -> string('association_type');
            $table -> integer('author_id') -> unsigned();
            $table -> foreign('author_id') -> references('id') -> on('profiles') -> onDelete('cascade');
            $table -> string('title');
            $table -> string('slug') -> unique();
            $table -> string('description') -> nullable();
            $table -> boolean('is_active') -> default(true);
            $table -> boolean('is_featured') -> default(false);
            $table -> boolean('is_pinned') -> default(false);
            $table -> boolean('is_published') -> default(false);
            $table -> boolean('is_archived') -> default(false);
            $table -> boolean('is_finalized') -> default(false);
            $table -> boolean('has_comments') -> default(false);
            $table -> boolean('has_revisions') -> default(false);
            $table -> boolean('has_chapters') -> default(false);
            $table -> boolean('has_drafts') -> default(false);
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
        Schema::dropIfExists('stories');
    }
}
