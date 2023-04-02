<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscordModerator extends Model
{
    protected $connection = 'discord';

    protected $fillable = [
        'discord_bot_id',
        'profile_id',
        'discord_id',
    ];

    public function bot(): BelongsTo { return $this -> belongsTo('App\Discord\DiscordBot', 'discord_bot_id'); }
    public function profile(): BelongsTo { return $this -> belongsTo('App\Profile', 'profile_id'); }
}
