<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;

class DiscordBot extends Model
{
    protected $connection = 'discord';
    protected $fillable = [
        'owner_id',
        'owner_type',
        'owner',
        'owner_user_id',
        'discord_id',
        'server_name',
    ];
    public function owner(){
        return $this->morphTo();
    }

    public function roles(){
        return $this -> hasMany('App\Discord\DiscordRole');
    }

    public function emojis(){
        return $this -> hasMany('App\Discord\BotEmojis');
    }

    public function admins(){
        return $this -> hasMany('App\Discord\DiscordAdmin');
    }
    public function moderators(){
        return $this -> hasMany('App\Discord\DiscordModerator');
    }
    public function guest(){
        return $this -> hasMany('App\Discord\DiscordGuest');
    }

    public function channels(){
        return $this -> hasOne('App\Discord\BotChannel');
    }
    public function settings(){
        return $this -> hasOne('App\Discord\BotSettings');
    }
}
