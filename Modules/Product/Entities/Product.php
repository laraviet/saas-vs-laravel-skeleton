<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasImageModel;

class Product extends Model
{
    use Translatable, Cachable, HasImageModel;

    protected $fillable = [];
    public $translatedAttributes = [];
}
