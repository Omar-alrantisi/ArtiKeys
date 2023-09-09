<?php

namespace App\Domains\Subscription\Models;

use App\Domains\Auth\Models\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_by_id
 * @property integer $mark_test_3
 * @property integer $mark_test_1
 * @property integer $mark_test_2
 * @property string $created_at
 * @property string $updated_at
 * @property string $name_en
 * @property User $user
 */
class SubscriberRating extends BaseModel
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
    protected $fillable = ['created_by_id','updated_by_id','user_id', 'mark_test_3','mark_test_2', 'created_at', 'updated_at', 'mark_test_1'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
