<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasImageModel;
use Modules\Product\Entities\Traits\Attribute\ProductAttribute;

class Product extends Model
{
    use Translatable, Cachable, HasImageModel;
    use ProductAttribute;

    const FEATURE_IMAGE = 'feature';
    const DETAIL_IMAGE = 'detail';

    protected $fillable = ['brand_id', 'status', 'shippable', 'downloadable', 'unit_price', 'quantity'];
    public $translatedAttributes = ['name', 'caption', 'description'];
}
