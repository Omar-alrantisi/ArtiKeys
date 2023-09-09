<?php
namespace App\Domains\Page\Models\Traits\Scope;

trait PageScope
{

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug','=',$slug);
    }
}
