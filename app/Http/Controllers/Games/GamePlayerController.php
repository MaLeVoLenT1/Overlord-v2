<?php

namespace App\Http\Controllers\Games;

use App\Games\GamePlayer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamePlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Games\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function show(GamePlayer $gamePlayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Games\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function edit(GamePlayer $gamePlayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Games\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GamePlayer $gamePlayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Games\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(GamePlayer $gamePlayer)
    {
        //
    }
}
