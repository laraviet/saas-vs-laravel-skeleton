<?php

namespace App\Models\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait NameFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param string $name
     *
     * @return Builder
     */
    public function scopeName($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }
}
