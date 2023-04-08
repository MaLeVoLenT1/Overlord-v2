<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConversationKeyword extends Model
{
    /** connection
     * @var string */
    protected $connection = 'ai';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'conversation_id',
        'keyword',
        'creator_id',
        'is_regex',
        'is_active',
        'is_case_sensitive'
    ];

    public function conversation(): BelongsTo { return $this -> belongsTo('App\AI\Conversation'); }
    public function creator(): BelongsTo { return $this -> belongsTo('App\Profile'); }
}
