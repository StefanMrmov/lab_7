<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\TextUI\Application;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {
        $categories = Category::query()->when($request->has('search'), fn ($q)=>$q->where('name','like','%'.$request->get('search').'%'))->latest()->get();
        return view('categories/index',compact('categories'));
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
    public function store(categoryRequest $request): RedirectResponse
    {
        $data=$request->validated();
        $data['slug']=Str::slug($data['name']);
        Category::query()
            ->create($data);

        return redirect()->route('categories.index')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->loadMissing('blogs');
        return view('categories/show',compact('category'));
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
    public function update(categoryRequest $request, Category $category): RedirectResponse
    {
        $data=$request->validated();
        $data['slug']=Str::slug($data['name']);
        $category->update($data);

        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->blogs()->delete();
        $category->delete();

        return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }
}
