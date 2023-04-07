<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ai')->create('training_data', function (Blueprint $table) {
            $table -> id();

            $table -> integer('intelligence_model_id') -> unsigned();
            $table -> foreign('intelligence_model_id') -> references('id') -> on('intelligence_models') -> onDelete('cascade');

            /** The Instruction or Question to give to the AI.
             * Instruction for LLaMa, Prompt for OpenAI (Synonyms) */
            $table -> string('instruction');

            /** If there needs to be input for the instruction. This is mostly for LLaMa. */
            $table -> string('input') -> nullable();

            /** The Answer to the Instruction or Question. Provided by the AI */
            $table -> string('output');

            $table -> boolean('is_active') -> default(true);
            $table -> boolean('is_curated') -> default(false);
            $table -> boolean('used') -> default(false);
            $table -> string('used_by') -> nullable();
            $table -> string('topic') -> nullable();

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
        Schema::dropIfExists('training_data');
    }
}
