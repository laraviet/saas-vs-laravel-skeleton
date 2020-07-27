<?php

namespace Modules\Product\Entities\Traits\Filterable;

trait BrandSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword);
    }
}
