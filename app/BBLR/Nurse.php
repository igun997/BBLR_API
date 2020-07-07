<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $phc_name
 * @property string $phc_address
 * @property int $created_at
 * @property User $user
 * @property TreatmentLog[] $treatmentLogs
 * @property Treatment[] $treatments
 */
class Nurse extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'address', 'phone', 'phc_name', 'phc_address', 'time_created'];

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
