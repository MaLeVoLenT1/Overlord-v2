<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAPIAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_p_i_associations', function (Blueprint $table) {
            $table -> id();
            $table -> integer('owner_id') -> unsigned();
            $table -> string('owner_type');

            $table -> string('api_key');
            $table -> string('secret') -> nullable();
            $table -> string('name');
            $table -> string('description') -> nullable();
            $table -> enum('type',[
                //Social Media APIS
                'discord',
                'twitch',
                'youtube',
                'twitter',
                'instagram',
                'facebook',
                'reddit',
                'github',
                'google',
                'microsoft',
                'apple',
                'amazon',
                'spotify',
                'tiktok',
                'pinterest',
                'tumblr',
                'snapchat',
                'linkedin',

                // AI APIS
                'openai',
                'witai',
                'dialogflow',
                'watson',
                'azure',
                'ibm',
                'huggingface',
                'rasa',
                'snips',

                // Cryptocurrency APIS
                'coinbase',
                'coinmarketcap',
                'binance',
                'bitfinex',
                'kraken',
                'poloniex',
                'gemini',
            ]);
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
        Schema::dropIfExists('a_p_i_associations');
    }
}
