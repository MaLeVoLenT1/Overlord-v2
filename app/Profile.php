<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Profile extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';
    protected $fillable = [
        'owner_id',
        'owner_type',
        'first',
        'last',
        'birthdate',
        'avatar',
        'overlord_rank',
    ];

    public function owner(): MorphTo { return $this -> morphTo(); }
    public function social_accounts(): MorphMany { return $this -> morphMany('App\SocialMedia', 'profile'); }
    public function discord_guests(): MorphMany { return $this -> morphMany('App\Discord\DiscordGuest', 'profile'); }
    public function discord_moderators(): MorphMany { return $this -> morphMany('App\Discord\DiscordModerator', 'profile'); }
    public function discord_admins(): MorphMany { return $this -> morphMany('App\Discord\DiscordAdmin', 'profile'); }
}
