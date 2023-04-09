<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Team extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'owner_id',
        'owner_type',
        'discord_id',
        'channel_id',
        'name',
        'description',
        'ticker',
        'member_count',
        'logo',
        'banner',
        'website',
        'color',
        'synonym',
    ];
    public function owner(): MorphTo { return $this -> morphTo(); }
    public function leaders(): MorphMany { return $this -> morphMany('App\Leader', 'association', 'association_type', 'association_id') -> where('type', 'team'); }
    public function members(): MorphMany { return $this -> morphMany('App\Member', 'association', 'association_type', 'association_id') -> where('type', 'team'); }
    public function officers(): MorphMany { return $this -> morphMany('App\Officer', 'association', 'association_type', 'association_id') -> where('type', 'team'); }
}
