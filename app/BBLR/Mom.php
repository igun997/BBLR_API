<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $birth
 * @property string $hospital
 * @property string $address
 * @property string $phone
 * @property int $time_modified
 * @property int $created_at
 * @property User $user
 * @property TreatmentLog[] $treatmentLogs
 * @property Treatment[] $treatments
 */
class Mom extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'birth', 'hospital', 'address', 'phone', 'time_modified', 'time_created'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatments()
    {
        return $this->hasMany('App\BBLR\Treatment');
    }
}
