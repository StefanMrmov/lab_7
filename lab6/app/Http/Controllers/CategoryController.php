<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;
use PHPUnit\TextUI\Application;

class CategoryController extends Controller
{
    protected CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index():AnonymousResourceCollection
    {
        $categories = $this->categoryRepository->all();
        return CategoryResource::collection($categories);
        //return view('categories/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categories/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryRequest $request): CategoryResource
    {
        $data=$request->validated();
        $category = $this->categoryRepository->create($data);
        return CategoryResource::make($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):  CategoryResource
    {
       $category = $this->categoryRepository->find($id);
       return CategoryResource::make($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories/edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryRequest $request, string $id): CategoryResource
    {
        $data=$request->validated();
        $category = $this->categoryRepository->find($id);
        $category = $this->categoryRepository->update($category,$data);
        return CategoryResource::make($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
      $category=$this->categoryRepository->find($id);
      $this->categoryRepository->delete($category);
      return response()->json(null, 204);
    }
}
