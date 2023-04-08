<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ai')->create('model_settings', function (Blueprint $table) {
            $table -> id();

            $table -> integer('intelligence_model_id') -> unsigned();
            $table -> foreign('intelligence_model_id') -> references('id') -> on('intelligence_models') -> onDelete('cascade');

            /** What sampling temperature to use, between 0 and 2.
             * Higher values like 0.8 will make the output more random,
             * while lower values like 0.2 will make it more focused and deterministic.
             * We generally recommend altering this or top_p but not both. */
            $table -> float('temperature') -> default(1.0);

            /** An alternative to sampling with temperature, called nucleus sampling,
             * where the model considers the results of the tokens with top_p probability mass.
             * So 0.1 means only the tokens comprising the top 10% probability mass are considered.
             * We generally recommend altering this or temperature but not both. */
            $table -> float('top_p') -> default(1.0);

            /** How many tokens to generate.
             * If you set this to 0, it will keep generating tokens until it hits the end of the input text. */
            $table -> integer('max_tokens') -> default(0);

            /** How many chat completion choices to generate for each input message. */
            $table -> integer('n') -> default(1);

            /** Whether to stop the chat completion when the model reaches the end of the input text.
             * If set to false, the model will continue generating tokens until it reaches the max_tokens limit. */
            $table -> string('stop') -> default(null);

            /** Number between -2.0 and 2.0.
             * Positive values penalize new tokens based on whether they appear in the text so far,
             * increasing the model's likelihood to talk about new topics.*/
            $table -> float('presence_penalty') -> default(0.0);

            /** Number between -2.0 and 2.0.
             * Positive values penalize new tokens based on whether they appear in the text so far,
             * increasing the model's likelihood to talk about new topics. */
            $table -> float('frequency_penalty') -> default(0.0);

            /** A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse. */
            $table -> string('user') -> default(null);

            /** These settings are for LLaMa + Alpaca */

            /** The number of tokens to return (The default is 128 if unspecified). [LLaMA + Alpaca] */
            $table -> integer('n_predict') -> default(128);

            /** The number of tokens to check for repetition (The default is 64 if unspecified). [LLaMA + Alpaca] */
            $table -> integer('repeat_last_n') -> default(64);

            /** The penalty for repeating tokens (The default is 1.2 if unspecified). [LLaMA + Alpaca] */
            $table -> float('repeat_penalty') -> default(1.2);

            /** The number of top tokens to consider (The default is 100 if unspecified). [LLaMA + Alpaca] */
            $table -> integer('top_k') -> default(100);

            /** The seed. The default is -1 (none). [LLaMA + Alpaca] */
            $table -> integer('seed') -> default(-1);

            /**  Number of threads to use (The default is 1 if unspecified). [LLaMA + Alpaca] */
            $table -> integer('threads') -> default(1);

            /** Debugging flag. [LLaMA + Alpaca] */
            $table -> boolean('debug') -> default(false);

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
        Schema::dropIfExists('model_settings');
    }
}
