<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    /** connection
     * @var string */
    protected $connection = 'ai';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'conversation_id',
        'profile_id',
        'message',
        'message_type',
        'role',
    ];

    public function conversation(): BelongsTo { return $this -> belongsTo('App\AI\Conversation'); }
    public function profile(): BelongsTo { return $this -> belongsTo('App\Profile'); }
}
