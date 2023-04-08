<?php

namespace App\AI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AI extends Model
{
    /** connection
     * @var string */
    protected $connection = 'ai';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'owner_id',
        'owner_type',
        'name',
        'description',
        'type',
        'is_public',
        'is_active',
    ];


    /** * @return MorphTo */
    public function owner(): MorphTo { return $this -> morphTo(); }

    /** * @return HasMany */
    public function models(): HasMany { return $this -> hasMany('App\AI\IntelligenceModel'); }
}
