<?php

namespace App\BLOG;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property int $level
 * @property boolean $status
 * @property string $token
 * @property string $created_at
 * @property string $updated_at
 * @property Article[] $articles
 */
class User extends Model
{

    protected $hidden = [
        "password",
        "token",
    ];

    /**
     * @var array
     */
    protected $fillable = ['username','fullname', 'password', 'email', 'phone', 'level', 'status', 'token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\BLOG\Article');
    }
}
