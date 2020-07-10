<?php

/**
 * Created by Reliese Model.
 */

namespace App\BLOG;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property int $created_at
 * 
 * @property Category $category
 * @property Collection|Article[] $articles
 * @property Collection|Category[] $categories
 *
 * @package App\BLOG
 */
class Category extends Model
{
	protected $table = 'categories';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'created_at' => 'int'
	];

	protected $fillable = [
		'name',
		'parent_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'parent_id');
	}

	public function articles()
	{
		return $this->hasMany(Article::class);
	}

	public function categories()
	{
		return $this->hasMany(Category::class, 'parent_id');
	}
}
