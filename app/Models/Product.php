<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function avatar()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'product_articles', 'product_id', 'article_id');
    }
}
