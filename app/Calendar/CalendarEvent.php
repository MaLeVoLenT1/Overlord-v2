<?php

namespace App\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CalendarEvent extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'calendar_id',
        'owner_id',
        'owner_type',
        'host_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'is_repeating',
        'repeat_day',
        'rsvp',
        'all_day',
        'all_week',
        'all_month',
        'details',
        'location',
        'priority',
        'permissions',
        'status',
        'type',
        'timezone',
    ];

    public function calendar(): BelongsTo { return $this -> belongsTo('App\Calendar\Calendar'); }
    public function host(): BelongsTo { return $this -> belongsTo('App\Profile','host_id','id'); }
    public function attendees(): HasMany { return $this -> hasMany('App\Calendar\EventAttendee'); }
    public function reviews(): HasMany { return $this -> hasMany('App\Calendar\EventReview'); }
    public function ratings(): HasMany { return $this -> hasMany('App\Calendar\EventRating'); }
}
