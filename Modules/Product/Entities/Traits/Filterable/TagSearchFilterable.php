<?php

namespace Modules\Product\Entities\Traits\Filterable;

trait TagSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword);
    }
}
