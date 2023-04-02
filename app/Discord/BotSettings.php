<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BotSettings extends Model
{
    protected $connection = 'discord';

    protected $fillable = [
        'discord_bot_id',
        'server_type',
        'server_information',
        'give_leadership_reports',
        'monitor_members',
        'monitor_linked_organizations',
        'track_crypto',
        'announce_events',
        'manage_teams',
        'alert_left_server',
        'alert_join_server',
        'monitor_organizations',
        'monitor_progression',
        'manage_welcome_message',
        'manage_roles',
    ];
    public function bot(): BelongsTo { return $this -> belongsTo('App\Discord\DiscordBot', 'discord_bot_id'); }
    public function events(): HasOne { return $this -> hasOne('App\Discord\BotEvents'); }
    public function timers(): HasMany { return $this -> hasMany('App\Discord\BotTimers'); }
}
