<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Product\Http\Requests\CreateTagRequest;
use Modules\Product\Http\Requests\UpdateTagRequest;
use Modules\Product\Repositories\Contracts\TagRepositoryInterface;

class TagController extends Controller
{
    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;


    /**
     * ProductCategoryController constructor.
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $tags = $this->genPagination($request, $this->tagRepository);

        return view('product::tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('product::tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateTagRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateTagRequest $request)
    {
        $this->tagRepository->create($request->except('_token'));

        return redirect()->route('tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $tag = $this->tagRepository->findById($id);

        return view('product::tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateTagRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateTagRequest $request, $id)
    {
        $this->tagRepository->updateById($id, $request->except(['_token', 'method']));

        return redirect()->route('tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->tagRepository->deleteById($id);

        return redirect()->route('tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('delete_success'));
    }
}
