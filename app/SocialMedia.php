<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMedia extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    protected $fillable = [
        'profile_id',
        'name',
        'url',
        'type',
        'icon',
    ];

    public function profile(): BelongsTo { return $this -> belongsTo('App\Profile'); }
}
