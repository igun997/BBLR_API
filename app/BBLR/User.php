<?php

namespace App\BBLR;

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
 * @property Baby[] $babies
 * @property Mom[] $moms
 * @property Nurse[] $nurses
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
    protected $fillable = ['username', 'password', 'email', 'phone', 'level', 'status', 'token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function babies()
    {
        return $this->hasMany('App\BBLR\Baby');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moms()
    {
        return $this->hasMany('App\BBLR\Mom');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nurses()
    {
        return $this->hasMany('App\BBLR\Nurse');
    }
}
