<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bblr_rule_id
 * @property int $parent_id
 * @property string $name
 * @property int $created_at
 * @property Category $category
 * @property BblrRule $bblrRule
 * @property Article[] $articles
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bblr_rule_id', 'parent_id', 'name', 'time_created'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\BBLR\Category', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bblrRule()
    {
        return $this->belongsTo('App\BBLR\BblrRule');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\BBLR\Article');
    }
}
