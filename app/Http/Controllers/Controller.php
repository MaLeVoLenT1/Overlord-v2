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

    /** [EXAMPLE] TIME: 2018-06-15 14:00:44 | MaLeVoLenT.8129 | MaLeVoLenT#8129) */
    protected $msgStart;

    public function __construct() {

    }
}
