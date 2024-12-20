<?php
namespace Database\Seeders;
use App\Models\Blog;
use Illuminate\Database\Seeder;
class BlogSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Blog:: factory(10)->create();
    }
}
