<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Article::truncate();

        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'category_id' => rand(1, 5),
            'user_id' => rand(1, 2),
//            'image' => 'https://picsum.photos/200/200?random=' . rand(1,1000)
        ];
    }
}
