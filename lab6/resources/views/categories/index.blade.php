    <h1>Clients</h1>

    <form method="GET" action="{{ route('categories.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('categories.create') }}">
        <button>Create Category</button>
    </a>

    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}">View</a>

                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this client?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
