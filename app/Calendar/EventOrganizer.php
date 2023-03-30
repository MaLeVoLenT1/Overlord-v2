<?php

namespace App\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventOrganizer extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'calendar_event_id',
        'organizer_id',
    ];

    public function calendar_event(): BelongsTo { return $this -> belongsTo('App\Calendar\CalendarEvent'); }
    public function organizer(): BelongsTo { return $this -> belongsTo('App\Profile','organizer_id','id'); }
}
