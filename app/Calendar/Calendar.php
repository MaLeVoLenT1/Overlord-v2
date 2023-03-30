<?php

namespace App\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Calendar extends Model
{
    protected $connection = 'mysql';

    protected $fillable = [
        'owner_id',
        'owner_type',
        'name',
        'description',
        'color',
        'is_public',
        'is_default',
        'is_active',
        'timezone',
        'permissions',
        'priority',
    ];

    public function owner(): MorphTo { return $this -> morphTo(); }
    public function events(): HasMany { return $this -> hasMany('App\Calendar\CalendarEvent'); }
}
