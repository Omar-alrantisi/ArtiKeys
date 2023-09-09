<?php

namespace App\Domains\Subscription\Models;

use App\Domains\Auth\Models\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_by_id
 * @property integer $country_id
 * @property integer $gender
 * @property integer $marital_status
 * @property string $created_at
 * @property string $updated_at
 * @property string $name_en
 * @property string $personal_image
 * @property string $identification_card
 * @property string $vaccination_certificate
 * @property string $name_ar
 * @property string $dob
 * @property string $status
 * @property User $user
 */
class Subscription extends BaseModel
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['status','created_by_id','updated_by_id','user_id', 'country_id','dob', 'created_at', 'updated_at', 'name_en', 'name_ar','gender','marital_status','personal_image','identification_card','vaccination_certificate'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subscriberRating()
    {
        return $this->belongsTo(SubscriberRating::class);
    }
}
