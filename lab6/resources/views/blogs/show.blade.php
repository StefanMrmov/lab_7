<h1>Blog Details</h1>

<div>
    <strong>title:</strong> {{ $blog->title }}
</div>

<div>
    <strong>Categories:</strong>
    <a href="{{ route('categories.show', $blog->category->id) }}">
        {{ $blog->category->name }}
    </a>
</div>

<div>
    <strong>Description:</strong> {{ $blog->description }}
</div>


<a href="{{ route('blogs.index') }}">Back to Blogs</a>
