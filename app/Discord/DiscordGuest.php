<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscordGuest extends Model
{
    protected $connection = 'discord';

    protected $fillable = [
        'discord_bot_id',
        'profile_id',
        'display_name',
        'discord_id',
        'discord_discriminator',
        'discord_username',

        'last_message',
        'last_message_updated_at',
        'joined',
        'rank',
        'left',
        'kicked',
    ];

    public function bot(): BelongsTo { return $this -> belongsTo('App\Discord\DiscordBot'); }
    public function profile(): BelongsTo { return $this -> belongsTo('App\Profile'); }
}
