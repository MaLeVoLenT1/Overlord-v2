<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HeaderKeywords extends Model
{
    protected $table = 'header_keywords';
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
        'pages',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public static function  generate(){
        if (Cache::has('HeaderKeywords')){
            $Keywords = Cache::get('HeaderKeywords');
            $full =  $Keywords;
        }else{
            $only = ['is_active' => true, 'pages' => 'all'];
            $Keywords =  static::where($only)->pluck('name')->all();
            $string = implode(', ', $Keywords);
            Cache::put('HeaderKeywords', $string , 1440);
            return $string;
        }

        return $full;
    }
}
