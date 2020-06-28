<?php

namespace App\Repositories;

use App\Exceptions\RepositoryException;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * The repository model.
     *
     * @var Model
     */
    protected $model;

    /**
     * The query builder.
     *
     * @var Builder
     */
    protected $query;

    /**
     * Selected column list
     *
     * @var array|null
     */
    protected $selectedColumns;

    /**
     * Alias for the query limit.
     *
     * @var int
     */
    protected $take;

    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $relations = [];

    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    protected $wheres = [];

    /**
     * Array of one or more where in clause parameters.
     *
     * @var array
     */
    protected $whereIns = [];

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [];

    /**
     * Array of scope methods to call on the model.
     *
     * @var array
     */
    protected $scopes = [];

    /**
     * Page name used in pagination
     *
     * @var string
     */
    protected $pageName;

    /**
     * Page number used in pagination
     *
     * @var int|null
     */
    protected $pageNo;

    /**
     * @inheritDoc
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        $this->newQuery()->eagerLoad()->setSelect();

        $models = $this->query->get();

        $this->unsetSelect()->unsetClauses();

        return $models;
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return $this->get()->count();
    }

    /**
     * @inheritDoc
     */
    public function with($relations): BaseRepositoryInterface
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $this->relations = $relations;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function find($id): ?Model
    {
        $this->unsetSelect()->unsetClauses();

        $this->newQuery()->eagerLoad()->setSelect();

        return $this->query->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findById($id): Model
    {
        $this->unsetSelect()->unsetClauses();

        $this->newQuery()->eagerLoad()->setSelect();

        return $this->query->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByColumn($item, $column): ?Model
    {
        $this->unsetSelect()->unsetClauses();

        $this->newQuery()->eagerLoad()->setSelect();

        return $this->query->where($column, $item)->first();
    }

    /**
     * @param  array  $filters
     * @param  array  $sorts
     * @param  int  $page
     * @param  int  $limit
     * @return LengthAwarePaginator
     */
    public function advancedPaginate($filters = [], $sorts = [], $page = 1, $limit = null): LengthAwarePaginator
    {
        if (!empty($filters)) {
            $this->filter($filters);
        }
        if (!empty($sorts)) {
            $this->orderBy($sorts);
        }
        if (!$limit) {
            $limit = config('pagination.per_page_number');
        }

        return $this->setPageNo($page)->paginate($limit);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(Model $model, array $attributes): Model
    {
        if (!$model->update($attributes)) {
            throw RepositoryException::updateFailed();
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function updateById($id, array $attributes): Model
    {
        $model = $this->findById($id);
        $this->update($model, $attributes);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function delete(Model $model): void
    {
        try {
            if (!$model->delete()) {
                throw new RepositoryException();
            }
        } catch (Exception $e) {
            throw RepositoryException::deleteFailed();
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id): void
    {
        $this->delete($this->findById($id));
    }

    protected function first(): Model
    {
        $this->newQuery()->eagerLoad()->setSelect()->setClauses()->setScopes();

        $model = $this->query->firstOrFail();

        $this->unsetClauses();

        return $model;
    }

    protected function filter($scopeName, $value = null): BaseRepositoryInterface
    {
        if (func_num_args() == 1) {
            $filters = func_get_arg(0);
            foreach ($filters as $scopeName => $value) {
                $this->scopes[$scopeName] = $value;
            }

            return $this;
        }

        if ($value) {
            $this->scopes[$scopeName] = $value;
        }

        return $this;
    }

    protected function get(): Collection
    {
        $this->newQuery()->eagerLoad()->setSelect()->setClauses()->setScopes();

        $models = $this->query->get();

        $this->unsetClauses();

        return $models;
    }

    protected function newQuery(): BaseRepositoryInterface
    {
        $this->query = $this->model->newQuery();

        return $this;
    }

    protected function limit($limit): BaseRepositoryInterface
    {
        $this->take = $limit;

        return $this;
    }

    protected function orderBy($column, $direction = 'asc'): BaseRepositoryInterface
    {
        if (func_num_args() == 1) {
            $orderBys = func_get_arg(0);
            foreach ($orderBys as $column => $direction) {
                $this->orderBys[] = compact('column', 'direction');
            }

            return $this;
        }

        $this->orderBys[] = compact('column', 'direction');

        return $this;
    }

    protected function setPageName(string $pageName): BaseRepositoryInterface
    {
        $this->pageName = $pageName;

        return $this;
    }

    protected function setPageNo(?int $pageNo): BaseRepositoryInterface
    {
        $this->pageNo = $pageNo;

        return $this;
    }

    protected function paginate($limit = 25, array $columns = ['*']): LengthAwarePaginator
    {
        $this->newQuery()->eagerLoad()->setSelect()->setClauses()->setScopes();

        $paginator = $this->query->paginate($limit, $columns, $this->pageName, $this->pageNo);

        $this->unsetClauses()->unsetPaginator();

        return $paginator;
    }

    protected function select(array $columns = ['*']): BaseRepositoryInterface
    {
        $this->selectedColumns = $columns;

        return $this;
    }

    protected function where($column, $value, $operator = '='): BaseRepositoryInterface
    {
        $this->wheres[] = compact('column', 'value', 'operator');

        return $this;
    }

    protected function whereIn($column, $values): BaseRepositoryInterface
    {
        $values = is_array($values) ? $values : [$values];

        $this->whereIns[] = compact('column', 'values');

        return $this;
    }

    /**
     * Add relationships to the query builder to eager load.
     *
     * @return BaseRepository
     */
    protected function eagerLoad(): self
    {
        $this->query->with($this->relations);

        return $this;
    }

    /**
     * Set selected columns to the query builder
     *
     * @return BaseRepository
     */
    protected function setSelect(): self
    {
        if ($this->selectedColumns) {
            $this->query->select($this->selectedColumns);
        }

        return $this;
    }

    /**
     * Set clauses on the query builder.
     *
     * @return BaseRepository
     */
    protected function setClauses(): self
    {
        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }

        foreach ($this->whereIns as $whereIn) {
            $this->query->whereIn($whereIn['column'], $whereIn['values']);
        }

        foreach ($this->orderBys as $orderBy) {
            $this->query->orderBy($orderBy['column'], $orderBy['direction']);
        }

        if (isset($this->take) and !is_null($this->take)) {
            $this->query->take($this->take);
        }

        return $this;
    }

    /**
     * Set query scopes.
     *
     * @return BaseRepository
     */
    protected function setScopes(): self
    {
        foreach ($this->scopes as $method => $args) {
            $scopeMethod = Str::camel($method);
            if ($this->model->hasNamedScope($scopeMethod)) {
                $this->query->{$scopeMethod}($args);
            }
        }

        return $this;
    }

    /**
     * Reset the query clause parameter arrays.
     *
     * @return BaseRepository
     */
    protected function unsetPaginator(): self
    {
        $this->pageName = null;
        $this->pageNo = null;

        return $this;
    }

    /**
     * Reset the query clause parameter arrays.
     *
     * @return BaseRepository
     */
    protected function unsetClauses(): self
    {
        $this->wheres = [];
        $this->whereIns = [];
        $this->scopes = [];
        $this->take = null;

        return $this;
    }

    /**
     * Reset the selected column list
     *
     * @return BaseRepository
     */
    protected function unsetSelect(): self
    {
        $this->selectedColumns = null;

        return $this;
    }
}
