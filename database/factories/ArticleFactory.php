<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        Article::truncate();

        $title = $this->faker->sentence;
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $this->faker->paragraph,
            'category_id' => rand(1, 5),
            'user_id' => rand(1, 2),
            //            'image' => 'https://picsum.photos/200/200?random=' . rand(1,1000)
        ];
    }
}
