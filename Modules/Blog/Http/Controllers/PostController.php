<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Http\Requests\CreatePostRequest;
use Modules\Blog\Http\Requests\UpdatePostRequest;
use Modules\Blog\Repositorires\Contracts\PostRepositoryInterface;

class PostController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * PostController constructor.
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $eagerLoad = $request->get('load', []);
        $this->postRepository->with($eagerLoad);

        if ($request->get('all')) {
            return response()->json($this->postRepository->all());
        }

        $posts = $this->postRepository->advancedPaginate(
            $request->get('filter', []),
            $request->get('sort', []),
            $request->get(config('pagination.page_name'), 1),
            $request->get(config('pagination.per_page_name'), config('pagination.per_page_number'))
        );

        return view('blog::posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePostRequest $request
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {

        $this->postRepository->create($request->all());

        return redirect()->route('posts.index')->with('success','Post created successfully');;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function show($id, Request $request)
    {
        $post = $this->postRepository->with($request->get('load', []))->findById($id);

        return view('blog::posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findById($id);

        return view('blog::posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdatePostRequest $request, $id)
    {

        try {
            $this->postRepository->updateById($id, $request->all());

            return redirect()->route('posts.index')->with('success', 'Post updated successfully');

        } catch (RepositoryException $e) {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->postRepository->deleteById($id);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
