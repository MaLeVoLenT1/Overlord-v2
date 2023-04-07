<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntelligenceModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ai')->create('intelligence_models', function (Blueprint $table) {
            $table -> id();

            $table -> integer('ai_id') -> unsigned();
            $table -> foreign('ai_id') -> references('id') -> on('a_i_s') -> onDelete('cascade');

            $table -> integer('owner_id') -> unsigned();
            $table -> string('owner_type');

            $table -> string('name');
            $table -> string('description');
            $table -> enum('type', [
                'gpt-4', 'gpt-4-0314', 'gpt-4-32k', 'gpt-4-32k-0314', 'gpt-3.5-turbo', 'gpt-3.5-turbo-0301',
                'text-davinci-003', 'text-davinci-002', 'code-davinci-002', 'DALL·E', 'Whisper', 'Embeddings',
                'text-moderation-latest', 'text-moderation-stable', 'text-curie-001', 'text-babbage-001',
                'text-ada-001', 'curie', 'babbage', 'ada', '7B', '13B', '33B', '65B',
            ]) -> default('gpt-3.5-turbo');
            $table -> enum('mode', [
                'text', 'image', 'video', 'audio', 'code', 'chat',
                'table', 'other', 'sequence', 'edit', 'complete', 'translate',
            ]) -> default('chat');
            $table -> boolean('is_public') -> default(true);
            $table -> boolean('is_active') -> default(false);
            $table -> boolean('is_trained') -> default(false);

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
        Schema::dropIfExists('intelligence_models');
    }
}
