<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;

class ArticlesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ArticleCategory::all();

        $titles = [
            'Cách Thưởng Thức Trà Đúng Điệu',
            'Lợi Ích Của Trà Thảo Mộc',
            'Bí Quyết Pha Trà Ngon Tại Nhà',
            'Top 5 Bộ Quà Tặng Trà Cao Cấp',
            'Thưởng Trà Như Một Nghệ Thuật',
            'Công Dụng Tuyệt Vời Của Trà Xanh',
            'Làm Quen Với Các Loại Trà Thảo Mộc',
            'Cách Chọn Ấm Pha Trà Chuẩn',
            'Trà Và Sức Khỏe: Những Điều Cần Biết',
            'Hướng Dẫn Tặng Quà Trà Sang Trọng'
        ];

        foreach ($titles as $index => $title) {
            $category = $categories[$index % $categories->count()]; // Phân bổ đều bài viết cho 5 danh mục

            Article::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => 'Nội dung chi tiết của bài viết "' . $title . '". Đây là bài viết về trà và quà tặng.',
                'article_category_id' => $category->id,
                'status' => true,
            ]);
        }
    }
}
