<?php

namespace Modules\Product\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Product\Entities\Tag;
use Modules\Product\Repositories\Contracts\TagRepositoryInterface;
use Modules\Product\Repositories\TagRepository;

class TagCacheRepository extends BaseCacheRepository implements TagRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param Tag $tag
     * @param CacheManager $cache
     * @param TagRepository $tagRepository
     */
    public function __construct(Tag $tag, CacheManager $cache, TagRepository $tagRepository)
    {
        $this->model = $tag;
        $this->cache = $cache;
        parent::__construct($tagRepository);
    }
}
