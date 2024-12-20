<?php
namespace App\Repositories;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

class BlogRepository implements BlogRepositoryInterface{
    public function all(): Collection
    {
        return Blog::all();
    }

    public function find(int $id): Blog
    {
        return Blog::query()
            ->findOrFail($id);
    }

    public function create(array $data): Blog
    {
        return Blog::query()
            ->create($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        $blog->update($data);

        return $blog;
    }

    public function delete(Blog $blog): bool
    {
        return $blog->delete();
    }
}
