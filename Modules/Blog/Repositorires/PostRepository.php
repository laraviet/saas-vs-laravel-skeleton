<?php

namespace Modules\Blog\Repositorires;

use App\Repositories\BaseRepository;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositorires\Contracts\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }
}
