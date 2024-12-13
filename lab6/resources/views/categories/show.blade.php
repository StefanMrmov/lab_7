<h1>{{ $category->name }}'s Details</h1>

<table border="1">
    <tr>
        <th>Name</th>
        <td>{{ $category->name }}</td>
    </tr>
    <tr>
        <th>Slug</th>
        <td>{{ $category->slug }}</td>
    </tr>
</table>

<h2>Blogs</h2>
<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($category->blogs as $blog)
        <tr>
            <td>
                <a href="{{ route('blogs.show', $blog->id) }}">
                    {{ $blog->title }}
                </a>
            </td>
            <td>{{ $blog->slug }}</td>
            <td>{{ $blog->description }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('categories.index') }}">Back to Categories</a>
