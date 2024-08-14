<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();
        $users = User::factory(10)->create();
        $newsletters = Newsletter::factory(2)->create();

        // Blog'ları oluşturalım
        Blog::factory(15)->make()->each(function ($blog) use ($categories, $users) {
            $blog->category_id = $categories->random()->id;
            $blog->user_id = $users->random()->id;
            $blog->save();
        });
    }
}
