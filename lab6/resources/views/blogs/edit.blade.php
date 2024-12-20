<h1>Edit Category</h1>

<form method="POST" action="{{ route('blogs.update', $blog) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="title">title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}">
        @error('title')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">description:</label>
        <input type="text" name="description" id="description" value="{{ old('description', $blog->description) }}">
        @error('description')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit">Update</button>
</form>

<a href="{{ route('blogs.index') }}">Back to blogs</a>
