<?php

namespace App\Story;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Section extends Model
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
        'type',
        'content',
        'title',
        'is_active',
        'has_image',
        'has_video',
        'has_audio',
        'has_comments',
        'order_number',
        'is_ai_generated',
        'revision_number',
        'chapter_number',
    ];
    public function association(): MorphTo { return $this -> morphTo(); }
    public function author(): BelongsTo { return $this -> belongsTo('App\Profile','author_id'); }
    public function images(): MorphMany { return $this -> morphMany('App\Hub\Image', 'association', 'association_type', 'association_id'); }
    public function videos(): MorphMany { return $this -> morphMany('App\Hub\Video', 'association', 'association_type', 'association_id'); }
    public function audios(): MorphMany { return $this -> morphMany('App\Hub\Audio', 'association', 'association_type', 'association_id'); }
    public function comments(): MorphMany { return $this -> morphMany('App\Hub\Comment', 'commentable', 'commentable_type', 'commentable_id'); }
    public function notes(): MorphMany { return $this -> morphMany('App\Story\Section','association', 'association_type', 'association_id') -> where('type','=', 'note'); }

}
