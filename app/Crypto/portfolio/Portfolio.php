<?php

namespace App\Crypto\portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Portfolio extends Model
{
    /** connection
     * @var array */
    protected $connection = 'crypto';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'owner_id',
        'owner_type',
        'name',
        'description',
        'balance',
        'profit',
        'loss',
        'total_invested',
        'total_withdrawn',
        'total_fees',
        'total_profit',
        'number_of_assets',
        'number_of_transactions',
        'number_of_withdrawals',
        'number_of_deposits',
        'number_of_trades',
    ];

    public function owner(): MorphTo { return $this -> morphTo(); }
    public function assets(): MorphMany { return $this -> morphMany('App\Crypto\portfolio\Asset', 'association', 'association_type', 'association_id'); }
}
