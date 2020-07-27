<?php

namespace Modules\Product\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Product\Entities\Brand;
use Modules\Product\Repositories\Contracts\BrandRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->model = $brand;
    }
}
