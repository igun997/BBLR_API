<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $status
 * @property float $from_weight
 * @property float $to_weight
 * @property string $updated_at
 * @property string $created_at
 * @property Category[] $categories
 */
class BblrRule extends Model
{



    /**
     * @var array
     */
    protected $fillable = ['status', 'from_weight', 'to_weight', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\BBLR\Category');
    }
}
