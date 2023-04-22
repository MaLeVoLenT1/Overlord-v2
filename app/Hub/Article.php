<?php

namespace App\Hub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'blog_id',
        'author_id',
        'title',
        'slug',
        'description',
    ];
    public function blog(): BelongsTo { return $this -> belongsTo('App\Hub\Blog','blog_id'); }
    public function sections(): MorphMany { return $this -> morphMany('App\Story\Section', 'association', 'association_type', 'association_id'); }
    public function comments(): MorphMany { return $this -> morphMany('App\Hub\Comment', 'commentable', 'commentable_type', 'commentable_id'); }
}
