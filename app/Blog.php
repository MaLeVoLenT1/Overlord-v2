<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Blog extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'association_id',
        'association_type',
        'name',
        'slug',
        'author_id',
        'description',
        'keywords',
        'is_active',
        'is_featured',
        'is_published',
        'is_pinned',
        'is_sponsored',
    ];
    public function association(): MorphTo {return $this -> morphTo();}
    public function author(): BelongsTo {return $this -> belongsTo('App\Profile','author_id');}
    public function articles(): HasMany {return $this -> hasMany('App\NewsArticle');}
    public function comments(): MorphMany { return $this -> morphMany('App\Hub\Comment', 'commentable', 'commentable_type', 'commentable_id'); }
}
