<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ai')->create('a_i_s', function (Blueprint $table) {
            $table -> id();

            $table -> integer('owner_id') -> unsigned();
            $table -> string('owner_type');
            $table -> string('name');
            $table -> string('description');
            $table -> enum('type', [
                'other', 'openai', 'huggingFace',
                'LangChain', 'LLaMA + Alpaca', 'AutoGPT', 'Stable Diffusion',
            ]) -> default('openai');
            $table -> boolean('is_public') -> default(true);
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
        Schema::dropIfExists('a_i_s');
    }
}
