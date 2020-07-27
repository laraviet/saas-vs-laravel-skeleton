<?php

namespace Modules\Product\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Product\Entities\Tag;
use Modules\Product\Repositories\Contracts\TagRepositoryInterface;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->model = $tag;
    }
}
