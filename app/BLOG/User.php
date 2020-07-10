<?php

/**
 * Created by Reliese Model.
 */

namespace App\BLOG;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string|null $fullname
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string|null $phone
 * @property int $level
 * @property bool $status
 * @property string|null $token
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\BLOG
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'level' => 'int',
		'status' => 'bool'
	];

	protected $hidden = [
		'password',
		'token'
	];

	protected $fillable = [
		'fullname',
		'username',
		'password',
		'email',
		'phone',
		'level',
		'status',
		'token'
	];

	public function articles()
	{
		return $this->hasMany(Article::class);
	}
}
