<?php

namespace App\Crypto;

use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    /** connection
     * @var array */
    protected $connection = 'crypto';

    protected $fillable = [
        'gecko_id',
        'symbol',
        'name',
        'image_url',
        'description',
        'blockchain_explorer_url',
        'blockchain_explorer_api_url',
    ];

    public function price(){
        return $this -> hasMany('App\Crypto\elements\Price');
    }

    public function market_cap(){
        return $this -> hasMany('App\Crypto\elements\Marketcap');
    }


}
