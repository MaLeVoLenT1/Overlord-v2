<?php

namespace App\Story;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Story extends Model
{
    /** connection
     * @var array */
    protected $connection = 'mysql';

    /** The attributes that are mass assignable.
     * @var array */
    protected $fillable = [
        'association_id',
        'association_type',
        'author_id',
        'title',
        'slug',
        'description',
        'genre',
        'type',

        'is_published',
        'is_featured',
        'is_archived',
        'is_pinned',
        'is_active',

        'has_comments',
        'has_chapters',
        'has_revisions',
        'has_manuscript',
        'has_drafts',
        'is_finalized',
    ];
    public function association(): MorphTo { return $this -> morphTo(); }
    public function architecture(): HasOne { return $this -> hasOne('App\Story\Elements\Architecture'); }
    public function timeline(): HasOne { return $this -> hasOne('App\Story\Timeline\Timeline'); }
    public function characters(): HasMany { return $this -> hasMany('App\Story\Character\Character'); }
    public function author(): BelongsTo { return $this -> belongsTo('App\Profile','author_id', 'association_type', 'association_id'); }
    public function sections(): MorphMany { return $this -> morphMany('App\Story\Section','association', 'association_type', 'association_id'); }
    public function drafts(): MorphMany { return $this -> morphMany('App\Story\Section','association', 'association_type', 'association_id') -> where('type','=', 'draft'); }
    public function revisions(): MorphMany { return $this -> morphMany('App\Story\Section','association', 'association_type', 'association_id') -> where('type','=', 'revision'); }
    public function final(): MorphMany { return $this -> morphMany('App\Story\Section','association', 'association_type', 'association_id') -> where('type','=', 'final'); }
    public function manuscript(): MorphMany { return $this -> morphMany('App\Story\Section','association', 'association_type', 'association_id') -> where('type','=', 'manuscript'); }
    public function notes(): MorphMany { return $this -> morphMany('App\Story\Section','association', 'association_type', 'association_id') -> where('type','=', 'note'); }
    public function comments(): MorphMany { return $this -> morphMany('App\Hub\Comment', 'commentable', 'commentable_type', 'commentable_id'); }
    public function getChapter($chapter): Collection { return $this -> sections() -> where('chapter_number','=', $chapter) -> get(); }
}
