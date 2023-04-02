<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BotEvent extends Model
{
    /** connection
     * @var array */
    protected $connection = 'discord';
    protected $fillable = [
        'discord_settings_id',
        'channel_create',
        'channel_update',
        'channel_delete',
        'member_kick',
        'member_ban_add',
        'member_ban_remove',
        'member_update',
        'invite_create',
        'invite_delete',
        'message_delete',
        'message_update',
    ];
    public function settings(): BelongsTo { return $this -> belongsTo('App\Discord\BotSettings'); }
}
