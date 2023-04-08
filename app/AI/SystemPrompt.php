<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SystemPrompt extends Model
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
        'prompt',
        'is_public',
        'is_active',
    ];

    public function model(): BelongsTo { return $this -> belongsTo('App\AI\IntelligenceModel'); }
    public function profile(): BelongsTo { return $this -> belongsTo('App\Profile'); }
}
