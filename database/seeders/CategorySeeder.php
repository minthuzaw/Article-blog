<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Sneakers',
            ],
            [
                'name' => 'Book',
            ],
            [
                'name' => 'Knowledge Sharing',
            ],
            [
                'name' => 'IT',
            ],
            [
                'name' => 'Girls',
            ],
            [
                'name' => 'Resources',
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
