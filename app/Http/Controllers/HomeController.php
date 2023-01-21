<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;
use Request as ajaxCall;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void */
    public function __construct()
    {
        parent::__construct();
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable */
    public function index(): Renderable
    {

        //if (ajaxCall::ajax()) {return response()->json($this -> dashboard);}
        JavaScript::put(["Dashboard" => $this -> dashboard]);
        return view('app')-> with('header' , $this -> dashboard['header']);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable */
    public function landing(): Renderable
    {
        return view('welcome');
    }
}
