<?php

namespace App\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventRating extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'calendar_event_id',
        'rating',
        'comment',
        'author_id',

        'is_anonymous',
        'is_approved',
        'is_flagged',
        'is_deleted',
        'is_spam',
        'needs_approval',
        'is_private',
        'is_public',
        'has_comment',
    ];

    public function calendar_event(): BelongsTo { return $this -> belongsTo('App\Calendar\CalendarEvent'); }
    public function author(): BelongsTo { return $this -> belongsTo('App\Profile','author_id','id'); }

}
