<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;

class BotCommand extends Model
{
    /** connection
     * @var array */
    protected $connection = 'discord';
}
