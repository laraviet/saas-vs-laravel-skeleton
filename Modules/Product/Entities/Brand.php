<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasImageModel;
use Modules\Product\Entities\Traits\Attribute\BrandAttribute;
use Modules\Product\Entities\Traits\Methods\BrandMethod;
use Modules\Product\Entities\Traits\Scope\BrandScope;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Brand extends Model implements HasMedia
{
    use Translatable, HasImageModel, Cachable;
    use BrandMethod, BrandAttribute, BrandScope;

    const THUMBNAIL = 'thumbnail';

    protected $fillable = ['is_feature', 'status'];
    public $translatedAttributes = ['name'];
}
