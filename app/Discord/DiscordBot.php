<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DiscordBot extends Model
{
    protected $connection = 'discord';
    protected $fillable = [
        'owner_id',
        'owner_type',
        'discord_id',
        'server_name',
    ];
    public function owner(): MorphTo { return $this -> morphTo(); }
    public function roles(): HasMany { return $this -> hasMany('App\Discord\DiscordRole'); }
    public function emojis(): HasMany { return $this -> hasMany('App\Discord\BotEmojis'); }
    public function admins(): HasMany { return $this -> hasMany('App\Discord\DiscordAdmin'); }
    public function moderators(): HasMany { return $this -> hasMany('App\Discord\DiscordModerator'); }
    public function guests(): HasMany { return $this -> hasMany('App\Discord\DiscordGuest'); }
    public function channels(): HasOne { return $this -> hasOne('App\Discord\BotChannel'); }
    public function settings(): HasOne { return $this -> hasOne('App\Discord\BotSettings'); }
    public function commands(): HasMany { return $this -> hasMany('App\Discord\BotCommand'); }
}
