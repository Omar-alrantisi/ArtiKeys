<?php

namespace App\Domains\WebsiteSetting\Models;

use App\Models\BaseModel;
use App\Models\Traits\CreatedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $created_by_id
 * @property integer $updated_by_id
 * @property string $logo
 * @property string $favicon
 * @property string $main_color
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class WebsiteSetting extends BaseModel
{
    use SoftDeletes,CreatedBy;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_by_id','logo','favicon','main_color','updated_by_id', 'created_at', 'updated_at', 'deleted_at'];
}
