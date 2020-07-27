<?php

namespace Modules\Product\Entities\Traits\Methods;

trait ProductCategoryMethod
{
    public static function statuses()
    {
        return [
            '1' => _t('active'),
            '0' => _t('inactive'),
        ];
    }
}
