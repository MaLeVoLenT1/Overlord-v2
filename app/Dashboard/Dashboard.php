<?php

namespace App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Dashboard\Utilities\Plugins;
use App\Dashboard\Utilities\Header;

class Dashboard
{
    var $request, $user, $header;
    public function __construct($user){
        $this -> request = Request::capture();
        $this -> user = $user;
        $this -> header = new Header();
    }

    private function calculateURI($uri): array
    {

        $array = explode('/', $uri);
        return [
            'main' => (isset($array[0]))? $array[0] : null,
            'sub' => (isset($array[1]))? $array[1] : null,
            'target' => (isset($array[2]))? $array[2] : null,
        ];
    }

    public function get($target = 'all'): array
    {
        $pages = $this -> calculateURI($this -> request -> path());
        switch($target){
            case'all':
            default:
                return [
                    'page' => [
                        'main' => $pages['main'],
                        'sub' => $pages['sub'],
                        'target' => $pages['target'],
                        'host' => explode($this -> request -> path(),$this -> request -> url())[0],
                        'uri' => $this -> request -> path(),
                    ],
                    'url' => $this -> request -> url(),
                    'header' => $this -> header -> header,
                    'request' => [
                        'env' => ['app_url' => env('APP_URL'), 'app_env' => env('APP_ENV')],
                        "discord_code" => ($this -> request["code"])? $this -> request["code"]: null,
                        "message" => ($this -> request["message"])? $this -> request["message"]: null,
                        "item" =>  null
                    ],
                    'user' => [
                        'data' => $this -> user,
                        'userAgent' => $this -> request -> userAgent(),
                    ],
                    'section' => null,
                ];
                break;
        }
    }
}
