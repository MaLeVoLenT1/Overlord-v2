<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BotEmojis extends Model
{
    /** connection
     * @var array */
    protected $connection = 'discord';
    protected $table = 'bot_emojis';

    protected $fillable = [
        'discord_bot_id',
        'emoji_id',
        'emoji_name',
        'type',
        'category',
        'sub_category',
    ];

    public function bot(): BelongsTo {  return $this -> belongsTo('App\Discord\DiscordBot'); }
}
