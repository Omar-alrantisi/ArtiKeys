<?php

namespace App\Domains\Subscription\Models;

use App\Domains\Auth\Models\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_by_id
 * @property string $about_user
 * @property string $user_interest_join
 * @property string $created_at
 * @property string $updated_at
 * @property string $developer_do
 * @property string $successful_developer
 * @property string $use_web_skills
 * @property string $user_after_5_years
 * @property string $user_benefit
 * @property User $user
 */
class PersonalQuestion extends BaseModel
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
    protected $fillable = ['created_by_id','updated_by_id','user_id', 'user_benefit','user_after_5_years', 'created_at', 'updated_at', 'user_web_skills','successful_developer','developer_do','user_interest_join','about_user'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
