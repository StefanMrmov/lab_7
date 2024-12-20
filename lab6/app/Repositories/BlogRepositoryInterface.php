<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

interface BlogRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): Blog;

    public function create(array $data): Blog;

    public function update(Blog $blog, array $data): Blog;

    public function delete(Blog $blog): bool;
}
