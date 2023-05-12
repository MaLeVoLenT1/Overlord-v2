<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class DiscordUser extends Model
{
    protected $connection = 'discord';
    protected $fillable = [
        'username',
        'display_name',
        'discord_discriminator',
        'discord_id',
        'email',
        'discord_last_message_time',
        'discord_last_message_id',
    ];

    /** * @return MorphMany */
    public function apis(): MorphMany { return $this -> morphMany('App\APIAssociation', 'user', 'owner_type', 'owner_id'); }

    /** * @return MorphOne */
    public function profile(): MorphOne { return $this -> morphOne('App\Profile', 'user','owner_type', 'owner_id'); }

}
