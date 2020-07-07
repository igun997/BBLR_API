<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $birth
 * @property float $weight_on_register
 * @property int $time_modfied
 * @property int $created_at
 * @property User $user
 * @property TreatmentLog[] $treatmentLogs
 */
class Baby extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'birth', 'weight_on_register', 'time_modfied', 'time_created'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\BBLR\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentLogs()
    {
        return $this->hasMany('App\BBLR\TreatmentLog');
    }
}
