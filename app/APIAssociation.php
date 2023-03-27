<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APIAssociation extends Model
{
    protected $connection = 'mysql';
    protected $table = 'a_p_i_associations';

    protected $fillable = [
        'owner_id',
        'owner_type',
        'owner',
        'owner_user_id',
    ];

    public function user(){return $this->morphTo();}

}
