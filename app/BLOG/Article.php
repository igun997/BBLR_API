<?php

/**
 * Created by Reliese Model.
 */

namespace App\BLOG;

use App\Casts\FileBase;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $featured_image
 * @property string|null $featured_video
 * @property string $title
 * @property string $content
 * @property int $category_id
 * @property Carbon $updated_at
 * @property Carbon $created_at
 *
 * @property Category $category
 * @property User $user
 *
 * @package App\BLOG
 */
class Article extends Model
{
	protected $table = 'articles';

	protected $casts = [
		'user_id' => 'int',
		'featured_image' => FileBase::class,
		'featured_video' => FileBase::class,
		'category_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'featured_image',
		'featured_video',
		'title',
		'content',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
