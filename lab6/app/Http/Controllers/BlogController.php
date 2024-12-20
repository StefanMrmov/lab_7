<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\blogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    protected BlogRepositoryInterface $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository){
        $this->blogRepository = $blogRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $blogs = $this->blogRepository->all();
        return BlogResource::collection($blogs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::query()->get();
        return view('blogs/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(blogRequest $request): BlogResource
    {
        $data = $request->validated();
        $blog = $this->blogRepository->create($data);
        return BlogResource::make($blog);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): BlogResource
    {
        $blog = $this->blogRepository->find($id);
        return BlogResource::make($blog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories= Category::query()->get();
        return view('blogs/edit', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(blogRequest $request, string $id): BlogResource
    {
       $data = $request->validated();
       $blog = $this->blogRepository->find($id);
       $blog= $this->blogRepository->update($blog,$data);
       return BlogResource::make($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $blog = $this->blogRepository->find($id);
        $this->blogRepository->delete($blog);
        return response()->json(null, 204);
    }
}
