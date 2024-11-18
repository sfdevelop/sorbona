<?php

namespace Database\Seeders;

use App\Models\Article;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'article';

    private static int $with = 1540;

    private static int $height = 800;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(15)->create();

        $this->uploadImageToSeed(Article::all());
    }
}
