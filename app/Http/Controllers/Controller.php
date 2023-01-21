<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Dashboard\Dashboard;
use App\User;
use Carbon\Carbon;
use DateTime;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /** @var Request $request */ protected $request;

    // HTML Objects
    public $dashboard;
    protected $user;

    // Discord Objects
    /** App\User, App\DiscordUser */
    protected $userObject;


    public function __construct() {
        // Grabs Request Object
        $this -> request = Request::capture();

        $this -> middleware(function ($request, $next) {
            $this -> user = Auth::user();
            $dash = new Dashboard($this -> user);    $this -> dashboard = $dash -> get();
            return $next($request);
        });
    }
}
