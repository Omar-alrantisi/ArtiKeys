<?php

namespace App\Domains\Page\Models;
use App\Domains\Page\Models\Traits\Attribute\PageAttribute;
use App\Domains\Page\Models\Traits\Scope\PageScope;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @property integer $id
 * @property integer $created_by_id
 * @property integer $updated_by_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Page extends BaseModel
{
    use PageScope,
        PageAttribute,
        SoftDeletes;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_by_id', 'updated_by_id', 'title', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at'];

}
