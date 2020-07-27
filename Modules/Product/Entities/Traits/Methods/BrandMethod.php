<?php

namespace Modules\Product\Entities\Traits\Methods;

trait BrandMethod
{
    public static function statuses()
    {
        return activeInactiveStatuses();
    }
}
