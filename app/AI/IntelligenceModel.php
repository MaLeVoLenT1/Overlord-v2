<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class IntelligenceModel extends Model
{
    /** connection
     * @var string */
    protected $connection = 'ai';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'ai_id',
        'owner_id',
        'owner_type',
        'name',
        'description',
        'type',
        'mode',
        'is_public',
        'is_active',
        'is_trained',
    ];

    public function ai(): BelongsTo { return $this -> belongsTo('App\AI\AI','ai_id','id'); }
    public function owner(): MorphTo { return $this -> morphTo('owner','owner_type'); }
    public function settings(): HasOne { return $this -> hasOne('App\AI\ModelSettings'); }
    public function prompts(): HasMany { return $this -> hasMany('App\AI\SystemPrompt'); }
    public function training_data(): HasMany { return $this -> hasMany('App\AI\TrainingData'); }
    public function conversations(): HasMany { return $this -> hasMany('App\AI\Conversation'); }
}
