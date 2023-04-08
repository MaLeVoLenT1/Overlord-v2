<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    /** connection
     * @var string */
    protected $connection = 'ai';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'intelligence_model_id',
        'profile_id',
        'name',
        'description',
        'is_public',
        'is_remembered',
    ];

    public function model(): BelongsTo { return $this -> belongsTo('App\AI\IntelligenceModel'); }
    public function profile(): BelongsTo { return $this -> belongsTo('App\Profile'); }
    public function messages(): HasMany { return $this -> hasMany('App\AI\Message'); }
    public function keywords(): HasMany { return $this -> hasMany('App\AI\ConversationKeyword'); }
}
