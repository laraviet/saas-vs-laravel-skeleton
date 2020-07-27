<?php

namespace Modules\Product\Entities\Traits\Relationship;

use Modules\Product\Entities\ProductCategory;

trait ProductCategoryRelationship
{
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }
}
