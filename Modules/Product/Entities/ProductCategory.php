<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasImageModel;
use Modules\Product\Entities\Traits\Attribute\ProductCategoryAttribute;
use Modules\Product\Entities\Traits\Methods\ProductCategoryMethod;
use Modules\Product\Entities\Traits\Relationship\ProductCategoryRelationship;
use Modules\Product\Entities\Traits\Scope\ProductCategoryScope;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class ProductCategory extends Model implements HasMedia
{
    use Translatable, Cachable, HasImageModel;
    use ProductCategoryAttribute, ProductCategoryMethod, ProductCategoryRelationship, ProductCategoryScope;

    const THUMBNAIL = 'thumbnail';

    protected $table = 'product_categories';
    protected $fillable = ['parent_id', 'is_feature', 'status'];
    public $translatedAttributes = ['name', 'description'];
}
