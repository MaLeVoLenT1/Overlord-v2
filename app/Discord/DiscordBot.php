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

    public function assignable_roles(){
        return $this -> hasMany('App\AssignableRole');
    }

    public function assignable_emojis(){
        return $this -> hasMany('App\AssignableEmoji');
    }

    public function admins(){
        return $this -> hasMany('App\DiscordAdmin');
    }
    public function moderators(){
        return $this -> hasMany('App\DiscordModerator');
    }
    public function verified_guest(){
        return $this -> hasMany('App\DiscordGuest');
    }

    public function management_channels(){
        return $this -> hasOne('App\ManagementChannel');
    }
    public function settings(){
        return $this -> hasOne('App\DiscordSettings');
    }
}
