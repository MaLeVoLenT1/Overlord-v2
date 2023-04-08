<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /** connection
     * @var array */
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'display_name',
        'password',
        'email',
        'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** * @return MorphMany */
    public function apis(): MorphMany { return $this -> morphMany('App\APIAssociation', 'user','owner_type', 'owner_id'); }

    public function AI(): MorphMany { return $this -> morphMany('App\AI\AI', 'owner','owner_type', 'owner_id'); }

    /** * @return MorphMany */
    public function bots(): MorphMany { return $this -> morphMany('App\Discord\DiscordBot', 'user','owner_type', 'owner_id'); }

    /** @return HasOne */
    public function discord_info(): HasOne { return $this -> hasOne('App\Discord\DiscordAssociation'); }

    /** * @return MorphOne */
    public function profile(): MorphOne { return $this -> morphOne('App\Profile', 'user','owner_type', 'owner_id'); }
}
