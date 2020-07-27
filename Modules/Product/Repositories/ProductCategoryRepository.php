<?php

namespace Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Repositories\Contracts\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param ProductCategory $productCategory
     */
    public function __construct(ProductCategory $productCategory)
    {
        $this->model = $productCategory;
    }

    /**
     * @inheritDoc
     */
    public function toArray($key, $column, $scope = null): array
    {
        $list = parent::toArray($key, $column, $scope);

        return array_merge([
            0 => "None",
        ], $list);
    }

    /**
     * @inheritDoc
     */
    public function updateById($id, array $attributes): Model
    {
        if ($attributes['parent_id'] != 0) {
            return parent::updateById($id, $attributes);
        }

        $model = parent::updateById($id, array_except($attributes, 'parent_id'));
        $model->parent_id = null;
        $model->save();

        return $model;
    }
}
