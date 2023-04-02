<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscordAssociation extends Model
{
    /** connection
     * @var array */
    protected $connection = 'discord';

    protected $fillable = [
        'user_id',
        'username',
        'display_name',
        'discord_discriminator',
        'discord_id',
        'discord_last_message_time',
        'discord_last_message_id',
    ];

    public function user(): BelongsTo { return $this -> belongsTo('App\User'); }
}
