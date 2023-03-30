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
    public function api(): MorphMany { return $this -> morphMany('App\APIAssociation', 'user', 'owner_type', 'owner_id'); }

    /** * @return MorphMany */
    public function discord_servers(): MorphMany { return $this -> morphMany('App\Discord\DiscordBot', 'user','owner_type', 'owner_id'); }

    /** * @return MorphMany */
    public function profile(): MorphMany { return $this -> morphMany('App\Profile', 'user','owner_type', 'owner_id'); }

}
