<?php

namespace Modules\Product\Entities\Traits\Filterable;

trait ProductCategorySearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword);
    }
}
