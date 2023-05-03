<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request as ajaxCall;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;


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
     * @return mixed */
    public function index(): Renderable
    {
        if ($this -> request -> ajax()){
            return response() -> json([
                'message' => 'Hello World!',
                'request' => $this -> request,
            ]);
        }
        else {
            JavaScript::put(["Dashboard" => $this -> dashboard]);
            return view('app')-> with('header' , $this -> dashboard['header']);
        }





    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable */
    public function landing(): Renderable
    {
        JavaScript::put(["Dashboard" => $this -> dashboard]);
        return view('app')-> with('header' , $this -> dashboard['header']);
    }
}
