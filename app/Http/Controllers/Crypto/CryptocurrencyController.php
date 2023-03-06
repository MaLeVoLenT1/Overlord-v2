<?php

namespace App\Http\Controllers\Crypto;

use App\Crypto\Cryptocurrency;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index() : Renderable
    {
        JavaScript::put(["Dashboard" => $this -> dashboard]);
        return view('app')-> with('header' , $this -> dashboard['header']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function show(Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function edit(Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cryptocurrency $cryptocurrency)
    {
        //
    }
}
