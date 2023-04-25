<?php

namespace App\Story\Character;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'association_id',
        'association_type',
        'author_id',
        'first_name',
        'last_name',
        'gender',

        'peak_age',
        'age_min',
        'age_max',

        'birth_date',
        'death_date',
        'birth_place',
        'death_place',
        'birth_story_event_id',
        'death_story_event_id',

        'description',
        'appearance',
        'background',
        'motivation',
        'role',
        'occupation',
        'notes',
    ];
}
