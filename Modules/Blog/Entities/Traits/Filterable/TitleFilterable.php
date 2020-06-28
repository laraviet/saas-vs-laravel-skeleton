<?php

namespace Modules\Blog\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait TitleFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param string $keyword
     *
     * @return Builder
     */
    public function scopeTitle($query, $keyword)
    {
        return $query->where('title', $keyword);
    }
}
