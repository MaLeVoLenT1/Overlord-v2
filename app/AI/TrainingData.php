<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $intelligence_model_id
 * This is the model for the fine-tuning of AI.
 */
class TrainingData extends Model
{
    /** connection
     * @var string */
    protected $connection = 'ai';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'intelligence_model_id',
        'instruction',
        'input',
        'output',
        'used',
        'is_public',
        'is_active',
        'used_by',
        'topic',
    ];

    public function model(): BelongsTo { return $this -> belongsTo('App\AI\IntelligenceModel'); }
}
