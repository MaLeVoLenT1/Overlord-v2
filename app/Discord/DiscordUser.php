<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class DiscordUser extends Model
{
    protected $connection = 'discord';
    protected $fillable = [
        'username',
        'display_name',
        'discord_discriminator',
        'discord_id',
        'first',
        'last',
        'email',
        'avatar',
        'discord_last_message_time',
        'discord_last_message_id',
        'overlord_rank',
    ];

    /**
     * @return MorphMany
     */
    public function api(): MorphMany
    {
        return $this -> morphMany('App\APIAssociation', 'user');
    }

    /**
     * @return MorphMany
     */
    public function discord_servers(): MorphMany
    {
        return $this -> morphMany('App\DiscordBot', 'user');
    }

}
