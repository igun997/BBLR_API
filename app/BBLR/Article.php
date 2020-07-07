<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $featured_image
 * @property string $featured_video
 * @property string $title
 * @property string $content
 * @property int $time_modified
 * @property int $created_at
 * @property Category $category
 */
class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'featured_image', 'featured_video', 'title', 'content', 'time_modified', 'time_created'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\BBLR\Category');
    }
}
