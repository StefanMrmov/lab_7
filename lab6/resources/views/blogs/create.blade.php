<h1>Create New Invoice</h1>

<form method="POST" action="{{ route('blogs.store') }}">
    @csrf

    <div>
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="title">title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">description:</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        @error('description')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Create Invoice</button>
</form>

<a href="{{ route('blogs.index') }}">Back to Invoices</a>
