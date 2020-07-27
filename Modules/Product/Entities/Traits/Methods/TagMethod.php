<?php

namespace Modules\Product\Entities\Traits\Methods;

trait TagMethod
{
    public static function statuses()
    {
        return activeInactiveStatuses();
    }
}
