<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BotTimer extends Model
{
    protected $connection = 'discord';

    protected $fillable = [
        'settings_id',
        'timer',
        'name',
        'description',
        'command',
        'enabled'
    ];
    public function settings(): BelongsTo { return $this -> belongsTo('App\Discord\BotSettings'); }
}
