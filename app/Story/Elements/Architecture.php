<?php

namespace App\Story\Elements;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Architecture extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'story_id',
        'premise',
    ];

    /** Returns The Story Structure
     * @return BelongsTo  */
    public function story(): BelongsTo { return $this -> belongsTo('App\Story\Story'); }
}
