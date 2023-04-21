<?php

namespace App\Crypto\portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Asset extends Model
{
    /** connection
     * @var array */
    protected $connection = 'crypto';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'association_id',
        'association_type',
        'profile_id',
        'crypto_id',
        'amount',
        'value',
        'name',
        'symbol',
        'platform',
        'quote',
    ];

    public function association(): MorphTo {return $this -> morphTo();}
    public function profile(): BelongsTo {return $this -> belongsTo('App\Profile','profile_id');}
    public function crypto(): BelongsTo {return $this -> belongsTo('App\Crypto\Crypto','crypto_id');}
}
