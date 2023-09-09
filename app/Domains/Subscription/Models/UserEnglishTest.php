<?php

namespace App\Domains\Subscription\Models;

use App\Domains\Auth\Models\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_by_id
 * @property string $level
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class UserEnglishTest extends BaseModel
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
    protected $fillable = ['created_by_id','updated_by_id','user_id', 'level','image', 'created_at', 'updated_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
