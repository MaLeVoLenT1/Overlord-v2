<?php

namespace App\Http\Controllers\Discord;

use App\Discord\DiscordBot;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DiscordBotController extends Controller
{

    /**
     * Bot response chat.
     *
     * @return JsonResponse
     */
    public function chat(): JsonResponse
    {
        if ($this -> request -> ajax()){




            return response() -> json([
                'message' => 'Hello World!',
                'request' => $this -> request,
            ]);
        }
        else return response() -> json(['message' => 'This is not an ajax request.']);
    }

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
     * @param  \App\Discord\DiscordBot  $discordBot
     * @return \Illuminate\Http\Response
     */
    public function show(DiscordBot $discordBot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discord\DiscordBot  $discordBot
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscordBot $discordBot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discord\DiscordBot  $discordBot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscordBot $discordBot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discord\DiscordBot  $discordBot
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscordBot $discordBot)
    {
        //
    }
}
