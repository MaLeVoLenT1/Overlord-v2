<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BotCommand extends Model
{
    /** connection * @var array */
    protected $connection = 'discord';

    /** fillable * @var array */
    protected $fillable = [
        'discord_bot_id',
        'command',
        'description',
        'enabled',
        'response',
        'type',
    ];

    /** bot * @return BelongsTo */
    public function bot(): BelongsTo { return $this -> belongsTo('App\Discord\DiscordBot'); }
}
