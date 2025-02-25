<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ProductArticlesSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $articles = Article::all();

        foreach ($articles as $article) {
            $randomProducts = $products->random(rand(3, 5));

            foreach ($randomProducts as $product) {
                DB::table('product_articles')->insert([
                    'product_id' => $product->id,
                    'article_id' => $article->id,
                ]);
            }
        }
    }
}
