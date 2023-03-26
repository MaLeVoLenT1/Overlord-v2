<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
        'first',
        'last',
        'birthdate',
        'avatar',
        'overlord_rank',
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
