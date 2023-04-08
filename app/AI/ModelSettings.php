<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelSettings extends Model
{

    /** connection
     * @var string */
    protected $connection = 'ai';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'intelligence_model_id',
        'temperature',
        'top_p',
        'max_tokens',
        'n',
        'stop',
        'presence_penalty',
        'frequency_penalty',
        'user',
        'n_predict',
        'repeat_last_n',
        'repeat_penalty',
        'top_k',
        'seed',
        'threads',
        'debug',
    ];
    public function model(): BelongsTo { return $this -> belongsTo('App\AI\IntelligenceModel'); }

}
