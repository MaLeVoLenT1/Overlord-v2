<?php

namespace App\Discord;

use Illuminate\Database\Eloquent\Model;

class BotEvent extends Model
{
    /** connection
     * @var array */
    protected $connection = 'discord';
}
