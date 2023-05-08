<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table -> id();

            $table -> integer('association_id') -> unsigned();
            $table -> string('association_type');
            $table -> integer('author_id') -> unsigned();
            $table -> foreign('author_id') -> references('id') -> on('profiles') -> onDelete('cascade');
            $table -> enum('type', [ 'revision', 'other', 'final', 'manuscript', 'draft', 'notes' ]) -> default('other');
            $table -> text('content') -> nullable();
            $table -> string('title') -> nullable();
            $table -> boolean('is_active') -> default(true);
            $table -> boolean('has_image') -> default(false);
            $table -> boolean('has_video') -> default(false);
            $table -> boolean('has_audio') -> default(false);
            $table -> boolean('has_comments') -> default(false);
            $table -> boolean('is_ai_generated') -> default(false);
            $table -> integer('order_number') -> unsigned() -> default(0);
            $table -> integer('revision_number') -> unsigned() -> default(0);
            $table -> integer('chapter_number') -> unsigned() -> default(0);

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
        Schema::dropIfExists('sections');
    }
}
