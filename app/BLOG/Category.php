<?php

namespace App\BLOG;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $created_at
 * @property Category $category
 * @property Article[] $articles
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\BLOG\Category', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\BLOG\Article');
    }
}
