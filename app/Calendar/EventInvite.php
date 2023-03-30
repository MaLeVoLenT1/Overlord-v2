<?php

namespace App\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventInvite extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'calendar_event_id',
        'inviter_id',
        'invitee_id',

        'accepted',
        'declined',
        'rsvp',
        'message',
        'response',
    ];

    public function calendar_event(): BelongsTo { return $this -> belongsTo('App\Calendar\CalendarEvent'); }

    public function inviter(): BelongsTo { return $this -> belongsTo('App\Profile','inviter_id','id'); }

    public function invitee(): BelongsTo { return $this -> belongsTo('App\Profile','invitee_id','id'); }
}
