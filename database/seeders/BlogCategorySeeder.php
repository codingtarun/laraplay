<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(10)->create();

        Blog::factory()->count(20)->create()->each(function ($blog) use ($categories) {
            $blog->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
