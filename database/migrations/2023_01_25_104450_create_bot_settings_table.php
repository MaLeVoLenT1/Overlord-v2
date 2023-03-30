<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('discord')->create('bot_settings', function (Blueprint $table) {
            $table -> id();
            $table -> integer('discord_bot_id') -> unsigned();
            $table -> foreign('discord_bot_id') -> references('id') -> on('discord_bots') -> onDelete('cascade');
            $table -> enum('server_type', ['team', 'organization', 'community', 'individual']) -> default('organization');

            $table -> longText('server_information') -> nullable();
            $table -> boolean('give_leadership_reports') -> default(false);
            $table -> boolean('monitor_members') -> default(false);
            $table -> boolean('monitor_linked_organizations') -> default(false);
            $table -> boolean('track_crypto') -> default(false);
            $table -> boolean('announce_events') -> default(false);
            $table -> boolean('manage_teams') -> default(false);
            $table -> boolean('alert_left_server') -> default(false);
            $table -> boolean('alert_join_server') -> default(false);
            $table -> boolean('monitor_organizations') -> default(false);
            $table -> boolean('monitor_progression') -> default(false);
            $table -> boolean('manage_welcome_message') -> default(false);
            $table -> boolean('manage_roles') -> default(false);
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
        Schema::dropIfExists('bot_settings');
    }
}
