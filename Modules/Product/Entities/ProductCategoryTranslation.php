<?php

namespace Modules\Product\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryTranslation extends Model
{
    use Cachable;

    protected $table = 'product_category_translations';
    protected $fillable = ['name', 'description'];
}
