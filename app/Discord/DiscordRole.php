<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscordRole extends Model
{
    protected $connection = 'discord';

    protected $fillable = [
        'discord_bot_id',
        'role_id',
        'role_name',
        'color'
    ];

    public function bot(): BelongsTo { return $this -> belongsTo('App\Discord\DiscordBot'); }
}
