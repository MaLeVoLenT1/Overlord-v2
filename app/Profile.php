<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';
    protected $fillable = [
        'owner_id',
        'owner_type',
        'owner',
        'owner_user_id',

        'first',
        'last',
        'birthdate',
        'avatar',
        'overlord_rank',
    ];

    public function owner(){
        return $this->morphTo();
    }

    public function social_accounts(){
        return $this->morphMany('App\SocialMedia', 'user');
    }
}
