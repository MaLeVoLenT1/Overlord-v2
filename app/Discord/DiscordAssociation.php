<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;

class DiscordAssociation extends Model
{
    /** connection
     * @var array */
    protected $connection = 'discord';

    protected $fillable = [
        'username',
        'display_name',
        'discord_discriminator',
        'discord_id',
        'discord_last_message_time',
        'discord_last_message_id',
    ];
}
