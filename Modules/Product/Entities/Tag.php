<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Traits\Attribute\TagAttribute;
use Modules\Product\Entities\Traits\Methods\TagMethod;
use Modules\Product\Entities\Traits\Scope\TagScope;

class Tag extends Model
{
    use Cachable, Translatable;
    use TagScope, TagMethod, TagAttribute;

    protected $fillable = ['status'];
    public $translatedAttributes = ['name'];
}
