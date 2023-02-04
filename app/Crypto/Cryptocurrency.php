<?php

namespace App\Crypto;

use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    /** connection
     * @var array */
    protected $connection = 'crypto';
}
