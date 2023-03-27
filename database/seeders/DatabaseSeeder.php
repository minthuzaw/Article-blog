<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*        Article::disableSearchSyncing();
                $this->call(Article::factory()->count(20)->create());
                Article::all()->searchable();
                Article::enableSearchSyncing();*/

        if (app()->environment() === 'production') {
            $this->call([AdminSeeder::class, CategorySeeder::class]);
        } else {
            $this->call([
                AdminSeeder::class,
                CategorySeeder::class,
                UserSeeder::class,
                ArticlesSeeder::class,
                CommentsSeeder::class,
            ]);
        }
    }
}
