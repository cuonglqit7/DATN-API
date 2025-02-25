<?php

namespace App\Listeners;

use App\Events\ProductCacheCleared;
use Illuminate\Support\Facades\Cache;

class ClearProductCache
{
    public function handle(ProductCacheCleared $event)
    {
        Cache::forget("product_{$event->productId}");
        Cache::forget('products');
    }
}
