<?php

namespace App\Domains\Subscription\Models;

use App\Domains\Auth\Models\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_by_id
 * @property integer $city_id
 * @property string $education_level
 * @property string $education_background
 * @property string $created_at
 * @property string $updated_at
 * @property string $arabic_writing
 * @property string $arabic_specking
 * @property string $english_writing
 * @property string $english_specking
 * @property string $hear_about
 * @property string $r_f_n_1
 * @property string $r_f_n_2
 * @property string $r_m_n_1
 * @property string $r_m_n_2
 * @property string $full_address
 * @property User $user
 */
class SubscriptionInfo extends BaseModel
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
    protected $fillable = ['created_by_id','updated_by_id','user_id', 'education_level','field_of_study', 'created_at', 'updated_at', 'education_background', 'arabic_writing','arabic_specking','english_specking','english_writing','r_f_n_1','r_f_n_2','r_m_n_1','r_m_n_2','hear_about','full_address'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
