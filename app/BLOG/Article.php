<?php

namespace App\BLOG;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $featured_image
 * @property string $featured_video
 * @property string $title
 * @property string $content
 * @property string $updated_at
 * @property string $created_at
 * @property Category $category
 * @property User $user
 */
class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'featured_image', 'featured_video', 'title', 'content', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\BLOG\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\BLOG\User');
    }
}
