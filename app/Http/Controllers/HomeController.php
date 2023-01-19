<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
        return view('home');
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
