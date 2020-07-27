<?php

namespace Modules\Product\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use Cachable;

    protected $fillable = ['name', 'caption', 'description'];
}
