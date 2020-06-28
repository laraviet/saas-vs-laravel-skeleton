<?php

namespace Modules\Blog\Entities\Traits\Scope;

use App\Models\Traits\Filterable\NameFilterable;
use Modules\Blog\Entities\Traits\Filterable\TitleFilterable;

trait PostScope
{
    use TitleFilterable;
}
