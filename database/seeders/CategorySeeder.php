<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Gadgets, devices and electronic accessories'],
            ['name' => 'Clothing', 'description' => 'Men and women fashion apparel'],
            ['name' => 'Home & Garden', 'description' => 'Furniture, decor and garden essentials'],
            ['name' => 'Sports', 'description' => 'Sports equipment and athletic gear'],
            ['name' => 'Books', 'description' => 'Fiction, non-fiction and educational books'],
            ['name' => 'Toys & Games', 'description' => 'Toys, board games and puzzles for all ages'],
            ['name' => 'Beauty', 'description' => 'Skincare, makeup and personal care products'],
            ['name' => 'Automotive', 'description' => 'Car parts, accessories and tools'],
            ['name' => 'Health', 'description' => 'Supplements, vitamins and wellness products'],
            ['name' => 'Food & Beverages', 'description' => 'Snacks, drinks and gourmet food items'],
        ];

        foreach ($categories as $index => $data) {
            $category = Category::create([
                'name'        => $data['name'],
                'slug'        => Str::slug($data['name']),
                'description' => $data['description'],
                'status'      => true,
            ]);

            $imageContent = file_get_contents("https://picsum.photos/seed/category{$index}/400/300");

            if ($imageContent !== false) {
                $fileName = 'category_' . ($index + 1) . '.jpg';
                $filePath = 'categories/' . $fileName;
                $fullPath = storage_path('app/public/' . $filePath);

                if (!is_dir(dirname($fullPath))) {
                    mkdir(dirname($fullPath), 0755, true);
                }

                file_put_contents($fullPath, $imageContent);

                $category->media()->create([
                    'name'      => $fileName,
                    'path'      => $filePath,
                    'disk'      => 'public',
                    'mime_type' => 'image/jpeg',
                    'size'      => strlen($imageContent),
                ]);
            }
        }
    }
}
