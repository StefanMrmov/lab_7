
<h1>Create New Category</h1>


<form action="{{ route('categories.store') }}" method="POST">
@csrf
<div>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    @error('name')
    <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div>
    <button type="submit">Create Category</button>
</div>
</form>

<a href="{{ route('blogs.index') }}">Back to Blogs</a>
