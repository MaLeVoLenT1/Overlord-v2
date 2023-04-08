<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ai')->create('messages', function (Blueprint $table) {
            $table -> id();

            $table -> integer('conversation_id') -> unsigned();
            $table -> foreign('conversation_id') -> references('id') -> on('conversations') -> onDelete('cascade');

            $table -> integer('profile_id') -> unsigned();
            $table -> foreign('profile_id') -> references('id') -> on('profiles');

            $table -> string('message');
            $table -> enum('message_type', [
                'text',
                'image',
                'video',
                'audio',
                'file',
            ]) -> default('text');
            $table -> enum('role',[
                'user',
                'system',
                'assistant'
            ]) -> default('user');

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
        Schema::dropIfExists('messages');
    }
}
