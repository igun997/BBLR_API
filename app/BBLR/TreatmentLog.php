<?php

namespace App\BBLR;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $mom_id
 * @property int $nurse_id
 * @property int $treatment_id
 * @property int $baby_id
 * @property int $asi_qty
 * @property string $asi_method
 * @property float $asi_amount
 * @property int $suhu
 * @property int $bb
 * @property int $created_at
 * @property int $updated_at
 * @property Mom $mom
 * @property Nurse $nurse
 * @property Treatment $treatment
 * @property Baby $baby
 */
class TreatmentLog extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['mom_id', 'nurse_id', 'treatment_id', 'baby_id', 'asi_qty', 'asi_method', 'asi_amount', 'suhu', 'bb', 'time_created', 'updated_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treatment()
    {
        return $this->belongsTo('App\BBLR\Treatment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baby()
    {
        return $this->belongsTo('App\BBLR\Baby');
    }
}
