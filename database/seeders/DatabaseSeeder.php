<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();

        $category1 = Category::factory()->create();
        $category2 = Category::factory()->create();
        $category3 = Category::factory()->create();

        Post::factory(5)->create([
            "user_id" => $user1->id,
            "category_id" => $category1->id
        ]);
           
        Post::factory(5)->create([
            "user_id" => $user2->id,
            "category_id" => $category2->id
        ]);

        Post::factory(5)->create([
            "user_id" => $user3->id,
            "category_id" => $category3->id
        ]);
    }
}
