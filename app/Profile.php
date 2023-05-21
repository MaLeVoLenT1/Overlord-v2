<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /** Discord user Data. */
    public function discord_guest_of(): MorphMany { return $this -> morphMany('App\Discord\DiscordGuest', 'profile', 'profile_type', 'profile_id'); }
    public function discord_moderator_of(): MorphMany { return $this -> morphMany('App\Discord\DiscordModerator', 'profile', 'profile_type', 'profile_id'); }
    public function discord_admin_of(): MorphMany { return $this -> morphMany('App\Discord\DiscordAdmin', 'profile', 'profile_type', 'profile_id'); }

    /** Users Hub Member data. */
    public function team_member_of(): MorphMany { return $this -> morphMany('App\Member', 'association', 'association_type', 'association_id') -> where('type', 'team'); }
    public function community_member_of(): MorphMany { return $this -> morphMany('App\Member', 'association', 'association_type', 'association_id') -> where('type', 'community'); }
    public function organization_member_of(): MorphMany { return $this -> morphMany('App\Member', 'association', 'association_type', 'association_id') -> where('type', 'organization'); }

    /** public function that displays the users Leader data. */
    public function team_leader_of(): BelongsTo { return $this -> BelongsTo('App\Leader', 'profile_id', 'id') -> where('type', 'team'); }
    public function community_leader_of(): BelongsTo { return $this -> BelongsTo('App\Leader', 'profile_id', 'id') -> where('type', 'community'); }
    public function organization_leader_of(): BelongsTo { return $this -> BelongsTo('App\Leader', 'profile_id', 'id') -> where('type', 'organization'); }

    /** public function that displays the users Officer data. */
    public function team_officer_of(): MorphMany { return $this -> morphMany('App\Officer', 'association', 'association_type', 'association_id') -> where('type', 'team'); }
    public function community_officer_of(): MorphMany { return $this -> morphMany('App\Officer', 'association', 'association_type', 'association_id') -> where('type', 'community'); }
    public function organization_officer_of(): MorphMany { return $this -> morphMany('App\Officer', 'association', 'association_type', 'association_id') -> where('type', 'organization'); }

    /** User Hub Owned Groups */
    public function teams(): MorphMany { return $this -> morphMany('App\Team', 'owner','owner_type', 'owner_id'); }
    public function communities(): MorphMany { return $this -> morphMany('App\Community', 'owner','owner_type', 'owner_id'); }
    public function organizations(): MorphMany { return $this -> morphMany('App\Organization', 'owner','owner_type', 'owner_id'); }

    /** Hub Owned Tools */
    public function social_accounts(): MorphMany { return $this -> morphMany('App\SocialMedia', 'profile', 'profile_type', 'profile_id'); }
    public function portfolios(): MorphMany { return $this -> morphMany('App\Crypto\portfolio\Portfolio', 'owner', 'owner_type', 'owner_id'); }
    public function bots(): MorphMany { return $this -> morphMany('App\Discord\DiscordBot', 'user','owner_type', 'owner_id'); }
    public function ai(): MorphMany { return $this -> morphMany('App\AI\AI', 'owner','owner_type', 'owner_id'); }
    public function models(): MorphMany { return $this -> morphMany('App\AI\IntelligenceModel', 'owner','owner_type', 'owner_id'); }
    public function prompts(): HasMany { return $this -> hasMany('App\AI\SystemPrompt', 'profile_id','id'); }
}
