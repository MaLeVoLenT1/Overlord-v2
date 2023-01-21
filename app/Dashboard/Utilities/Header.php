<?php

namespace App\Dashboard\Utilities;
use App\Base\HeaderInformation;
use App\Base\HeaderKeywords;
use App\Base\HeaderViewport;
class Header
{
    var $header;
    public function __construct(){
        $this -> header = [
            'keywords' => HeaderKeywords::generate(),
            'viewPort' => HeaderViewport::generate(),
            'description' => HeaderInformation::where('is_active', true)->pluck('description')[0],
            'author' => HeaderInformation::where('is_active', true)->pluck('author')[0],
            'icon' => HeaderInformation::where('is_active', true)->pluck('icon')[0]
        ];
        return $this -> header;
    }
}
