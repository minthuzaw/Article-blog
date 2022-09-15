<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::create([
             'name' => 'Min Thu Zaw',
             'email' => 'min@gmail.com',
             'password' => Hash::make('password')
         ]);
        Article::factory()->count(20)->create();
        Category::factory()->count(5)->create();
        Comment::factory()->count(40)->create();

        User::factory()->create([
            "name" => "Alice",
            "email" => "alice@gmail.com",
        ]);
        User::factory()->create([
            "name" => "Bob",
            "email" => "bob@gmail.com",
        ]);
    }
}
