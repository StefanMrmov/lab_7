<h1>Blogs</h1>

    <form method="GET" action="{{ route('blogs.index') }}">
        <label for="category">Filter by category name:</label>
        <select name="category" id="category">
            <option value="{{null}}">All</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ ucfirst($category->name) }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>

<a href="{{ route('blogs.create') }}">
    <button>Create Blog</button>
</a>

<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Slug</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>
                <a href="{{ route('categories.show', $blog->category->id) }}">
                    {{ $blog->category->name }}
                </a>
            </td>
            <td>{{ $blog->slug }}</td>
            <td>{{ $blog->description }}</td>
            <td>
                <a href="{{ route('blogs.show', $blog->id) }}">View</a>
                <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>

                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="http://127.0.0.1:8000/categories">Go to Categories</a>
