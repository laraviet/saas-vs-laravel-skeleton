<?php

namespace Modules\Product\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Repositories\Contracts\ProductCategoryRepositoryInterface;
use Modules\Product\Repositories\ProductCategoryRepository;

class ProductCategoryCacheRepository extends BaseCacheRepository implements ProductCategoryRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param ProductCategory $productCategory
     * @param CacheManager $cache
     * @param ProductCategoryRepository $productCategoryRepository
     */
    public function __construct(ProductCategory $productCategory, CacheManager $cache, ProductCategoryRepository $productCategoryRepository)
    {
        $this->model = $productCategory;
        $this->cache = $cache;
        parent::__construct($productCategoryRepository);
    }
}
