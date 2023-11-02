<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BlogPost;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $simpleUsers = User::factory(4)->create();

        $userAdmin = User::factory()->create([
            'name' => 'Avalia',
            'email' => 'avalia@example.com',
            'role' => 'admin'
        ]);

        $categories = Category::factory(5)->create();

        $blogPosts = BlogPost::factory(45)
            ->hasAttached($categories->random(2))
            ->for($userAdmin)
            ->create();
        
        Comment::factory(10)
            ->for($simpleUsers->random(1)->first())
            ->for($blogPosts->random(1)->first())
            ->create();
    }
}
