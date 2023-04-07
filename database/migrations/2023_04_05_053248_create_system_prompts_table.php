<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPromptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ai')->create('system_prompts', function (Blueprint $table) {
            $table -> id();
            $table -> integer('intelligence_model_id') -> unsigned();
            $table -> foreign('intelligence_model_id') -> references('id') -> on('intelligence_models') -> onDelete('cascade');

            $table -> integer('profile_id') -> unsigned();
            $table -> foreign('profile_id') -> references('id') -> on('profiles');

            $table -> string('name');
            $table -> string('description') -> nullable();
            $table -> string('prompt');
            $table -> boolean('is_active') -> default(true);
            $table -> boolean('is_public') -> default(true);

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
        Schema::dropIfExists('system_prompts');
    }
}
