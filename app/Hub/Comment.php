<?php

namespace App\Hub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $connection = 'mysql';
    protected $table = 'comments';

    protected $fillable = [
        'body',
        'commentable_id',
        'commentable_type',
        'author_id',
        'is_anonymous',
        'is_approved',
        'is_deleted',
        'is_spam',
        'needs_approval',
        'is_private',
        'is_public',
    ];

    public function commentable(): MorphTo  { return $this -> morphTo(); }

    public function author(): BelongsTo { return $this -> belongsTo('App\Profile','author_id','id'); }

    public function replies(): HasMany { return $this -> hasMany('App\Hub\Reply'); }
}
