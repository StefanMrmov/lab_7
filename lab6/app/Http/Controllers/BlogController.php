<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\blogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $blogs = Blog::query()->with('category')->when($request->get('category') !=null,
           fn($q) => $q->where('category_id', $request->get('category')) )->get();
        return view('blogs/index', compact('blogs','categories'));
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
    public function store(blogRequest $request)
    {
        $data = $request->validated();
        $data['slug']=Str::slug($data['title']);
        Blog::query()->create($data);
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->loadMissing('category');
        return view('blogs/show', compact('blog'));
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
    public function update(blogRequest $request, Blog $blog): RedirectResponse
    {
        $blog->update($request->validated());
        return redirect()->route('blogs.index')->with('status', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('status', 'Blog deleted successfully!');
    }
}
