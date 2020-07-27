<?php

namespace Modules\Product\Entities\Traits\Methods;

trait ProductMethod
{
    public static function statuses()
    {
        return activeInactiveStatuses();
    }
}
