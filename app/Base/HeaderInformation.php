<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;

class HeaderInformation extends Model
{
    protected $table = 'header_information';
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author',
        'description',
        'is_active',
        'pages',
        'icon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
