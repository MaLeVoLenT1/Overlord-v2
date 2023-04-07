<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ai')->create('conversation_keywords', function (Blueprint $table) {
            $table -> id();

            $table -> integer('conversation_id') -> unsigned();
            $table -> foreign('conversation_id') -> references('id') -> on('conversations') -> onDelete('cascade');

            $table -> string('keyword');

            $table -> integer('creator_id') -> unsigned();
            $table -> foreign('creator_id') -> references('id') -> on('profiles');

            $table -> boolean('is_regex') -> default(false);
            $table -> boolean('is_case_sensitive') -> default(false);
            $table -> boolean('is_active') -> default(true);

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
        Schema::dropIfExists('conversation_keywords');
    }
}
