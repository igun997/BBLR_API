<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $mom_id
 * @property int $nurse_id
 * @property int $status
 * @property int $created_at
 * @property Mom $mom
 * @property Nurse $nurse
 * @property TreatmentLog[] $treatmentLogs
 */
class Treatment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['mom_id', 'nurse_id', 'status', 'time_created'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mom()
    {
        return $this->belongsTo('App\BBLR\Mom');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nurse()
    {
        return $this->belongsTo('App\BBLR\Nurse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentLogs()
    {
        return $this->hasMany('App\BBLR\TreatmentLog');
    }
}
