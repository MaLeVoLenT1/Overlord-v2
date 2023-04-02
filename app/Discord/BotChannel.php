<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BotChannel extends Model
{
     protected $connection = 'discord';
     protected $fillable = [
         'discord_bot_id',
         'channel_id',
         'name',
         'type',
     ];
        public function bot(): BelongsTo { return $this -> belongsTo('App\Discord\DiscordBot'); }
}
