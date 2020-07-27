<?php

namespace Modules\Product\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Product\Entities\Brand;
use Modules\Product\Repositories\BrandRepository;
use Modules\Product\Repositories\Contracts\BrandRepositoryInterface;

class BrandCacheRepository extends BaseCacheRepository implements BrandRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param Brand $brand
     * @param CacheManager $cache
     * @param BrandRepository $brandRepository
     */
    public function __construct(Brand $brand, CacheManager $cache, BrandRepository $brandRepository)
    {
        $this->model = $brand;
        $this->cache = $cache;
        parent::__construct($brandRepository);
    }
}
