<?php

namespace App\Observers;

use App\Models\Product;
use App\Events\ProductCacheCleared;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    public function updated(Product $product)
    {
        event(new ProductCacheCleared($product->id));
        Cache::forget('products');
    }

    public function deleted(Product $product)
    {
        event(new ProductCacheCleared($product->id));
        Cache::forget('products');
    }

    public function attached(Product $product, string $relation, array $ids)
    {
        if ($relation === 'articles') {
            event(new ProductCacheCleared($product->id));
            Cache::forget('products');
        }
    }

    public function detached(Product $product, string $relation, array $ids)
    {
        if ($relation === 'articles') {
            event(new ProductCacheCleared($product->id));
            Cache::forget('products');
        }
    }
}
