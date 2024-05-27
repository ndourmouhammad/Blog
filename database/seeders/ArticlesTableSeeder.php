<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Seed the articles table.
     */
    public function run(): void
    {
        Article::factory()->count(10)->create();
    }
}
