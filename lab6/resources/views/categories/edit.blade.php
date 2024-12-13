<h1>Edit Client</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
    </div>

    <div>
        <button type="submit">Update Category</button>
    </div>
</form>

<a href="{{ route('categories.index') }}">Back to Category</a>
