<?php

namespace App\Http\Controllers\Story\Characters;

use App\Http\Controllers\Controller;
use App\Story\Character\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
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
     * @param  \App\Story\Character\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story\Character\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character\Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story\Character\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character\Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story\Character\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character\Character $character)
    {
        //
    }
}
