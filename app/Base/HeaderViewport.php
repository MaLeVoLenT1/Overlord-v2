<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HeaderViewport extends Model
{
    protected $table = 'header_viewports';
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property',
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
        if (Cache::has('HeaderViewport')){
            $Viewports = Cache::get('HeaderViewport');
            $full =  $Viewports;
        }else{
            $only = ['is_active' => true, 'pages' => 'all'];
            $Viewports = static::where($only)->pluck('property')->all();
            $string = implode(', ', $Viewports);
            Cache::put('HeaderViewport', $string , 1440);
            return $string;
        }
        return $full;
    }
}
