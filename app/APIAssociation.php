<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class APIAssociation extends Model
{
    protected $connection = 'mysql';
    protected $table = 'a_p_i_associations';

    protected $fillable = [
        'owner_id',
        'owner_type',
        'name',
        'api_key',
        'other',
        'secret',
        'description',
        'type',
    ];

    public function user(): MorphTo {return $this->morphTo();}

}
