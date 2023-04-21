<?php

namespace App\Hub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'comment_id',
        'author_id',
        'body',
        'is_anonymous',
        'is_approved',
        'is_deleted',
        'is_spam',
        'needs_approval',
        'is_private',
        'is_public',
    ];
    public function comment(): BelongsTo { return $this -> belongsTo('App\Hub\Comment'); }
    public function author(): BelongsTo { return $this -> belongsTo('App\Profile','author_id','id'); }
}
