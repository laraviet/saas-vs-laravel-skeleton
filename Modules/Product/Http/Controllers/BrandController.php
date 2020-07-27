<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Product\Entities\Brand;
use Modules\Product\Http\Requests\CreateBrandRequest;
use Modules\Product\Http\Requests\UpdateBrandRequest;
use Modules\Product\Repositories\Contracts\BrandRepositoryInterface;

class BrandController extends Controller
{
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * ProductCategoryController constructor.
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $brands = $this->genPagination($request, $this->brandRepository);

        return view('product::brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('product::brands.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateBrandRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateBrandRequest $request)
    {
        $brand = $this->brandRepository->create($request->except('_token'));
        $this->uploadImage($brand, $request, 'thumbnail', Brand::THUMBNAIL);

        return redirect()->route('brands.index')
            ->with(config('core.session_success'), _t('brand') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $brand = $this->brandRepository->findById($id);

        return view('product::brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateBrandRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $brand = $this->brandRepository->updateById($id, $request->except(['_token', 'method']));
        $this->uploadImage($brand, $request, 'thumbnail', Brand::THUMBNAIL);

        return redirect()->route('brands.index')
            ->with(config('core.session_success'), _t('brand') . ' ' . _t('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->brandRepository->deleteById($id);

        return redirect()->route('brands.index')
            ->with(config('core.session_success'), _t('brand') . ' ' . _t('delete_success'));
    }
}
