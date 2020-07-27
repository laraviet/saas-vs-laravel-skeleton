<?php

namespace Modules\Product\Entities\Traits\Attribute;

use Modules\Core\Entities\Traits\BaseImageProcess;

trait TagAttribute
{
    use BaseImageProcess;

    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }
}
