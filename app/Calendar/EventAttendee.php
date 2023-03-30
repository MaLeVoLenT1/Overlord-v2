<?php

namespace App\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventAttendee extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'calendar_event_id',
        'attender_id',
    ];

    public function calendar_event(): BelongsTo
    {
        return $this -> belongsTo('App\Calendar\CalendarEvent');
    }

    public function organizer(): BelongsTo
    {
        return $this -> belongsTo('App\Profile','attender_id','id');
    }
}
