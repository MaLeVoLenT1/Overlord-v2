<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Member extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'association_id',
        'association_type',
        'profile_id',
    ];

    public function association(): MorphTo {return $this -> morphTo();}
    public function profile(): BelongsTo {return $this -> belongsTo('App\Profile','profile_id');}
}
