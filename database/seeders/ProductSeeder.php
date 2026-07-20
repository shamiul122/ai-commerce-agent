<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();
        $brandIds    = Brand::pluck('id')->toArray();

        $products = [
            ['name' => 'Wireless Bluetooth Headphones',    'sku' => 'ELEC-001', 'short_description' => 'Noise-cancelling over-ear headphones',         'price' => 79.99],
            ['name' => 'Smartphone Stand',                 'sku' => 'ELEC-002', 'short_description' => 'Adjustable aluminum phone stand',               'price' => 24.99],
            ['name' => 'USB-C Hub Adapter',                'sku' => 'ELEC-003', 'short_description' => '7-in-1 multiport USB-C hub',                    'price' => 45.50],
            ['name' => 'Men Classic Cotton T-Shirt',       'sku' => 'CLTH-001', 'short_description' => 'Comfortable cotton tee in multiple colors',      'price' => 19.99],
            ['name' => 'Women Summer Floral Dress',        'sku' => 'CLTH-002', 'short_description' => 'Lightweight floral print sundress',              'price' => 39.99],
            ['name' => 'Unisex Running Sneakers',          'sku' => 'CLTH-003', 'short_description' => 'Lightweight breathable running shoes',            'price' => 59.99],
            ['name' => 'Ceramic Plant Pot Set',            'sku' => 'HOME-001', 'short_description' => 'Set of 3 minimalist ceramic pots',               'price' => 34.99],
            ['name' => 'LED Desk Lamp',                    'sku' => 'HOME-002', 'short_description' => 'Adjustable LED lamp with USB port',              'price' => 29.99],
            ['name' => 'Scented Soy Candle',              'sku' => 'HOME-003', 'short_description' => 'Lavender and vanilla hand-poured candle',        'price' => 15.99],
            ['name' => 'Yoga Mat Premium',                 'sku' => 'SPRT-001', 'short_description' => 'Non-slip exercise yoga mat 6mm thick',           'price' => 28.99],
            ['name' => 'Stainless Steel Water Bottle',     'sku' => 'SPRT-002', 'short_description' => 'Double-wall insulated 750ml bottle',             'price' => 22.50],
            ['name' => 'Resistance Bands Set',             'sku' => 'SPRT-003', 'short_description' => 'Set of 5 color-coded resistance bands',          'price' => 18.99],
            ['name' => 'The Art of Programming',           'sku' => 'BOOK-001', 'short_description' => 'Comprehensive guide to coding fundamentals',     'price' => 34.99],
            ['name' => 'Mystery of the Lost City',         'sku' => 'BOOK-002', 'short_description' => 'Bestselling adventure fiction novel',            'price' => 12.99],
            ['name' => 'Cooking for Beginners',            'sku' => 'BOOK-003', 'short_description' => 'Easy recipes for everyday meals',                'price' => 16.99],
            ['name' => 'Wooden Building Blocks',           'sku' => 'TOYS-001', 'short_description' => '100-piece colorful wooden block set',            'price' => 25.99],
            ['name' => 'Strategy Board Game',              'sku' => 'TOYS-002', 'short_description' => 'Classic strategy game for 2-4 players',           'price' => 29.99],
            ['name' => 'RC Racing Car',                    'sku' => 'TOYS-003', 'short_description' => 'High-speed remote control car',                  'price' => 49.99],
            ['name' => 'Vitamin C Serum',                  'sku' => 'BEAU-001', 'short_description' => 'Brightening face serum with hyaluronic acid',    'price' => 22.99],
            ['name' => 'Organic Face Moisturizer',         'sku' => 'BEAU-002', 'short_description' => 'Daily hydrating organic moisturizer',            'price' => 18.50],
            ['name' => 'Hair Repair Shampoo',              'sku' => 'BEAU-003', 'short_description' => 'Sulfate-free damaged hair repair shampoo',       'price' => 14.99],
            ['name' => 'Car Phone Mount',                  'sku' => 'AUTO-001', 'short_description' => 'Magnetic dashboard phone holder',               'price' => 12.99],
            ['name' => 'Dash Cam Full HD',                 'sku' => 'AUTO-002', 'short_description' => '1080p front and rear dash camera',              'price' => 89.99],
            ['name' => 'Portable Jump Starter',            'sku' => 'AUTO-003', 'short_description' => 'Compact car battery jump starter pack',          'price' => 59.99],
            ['name' => 'Multivitamin Gummies',             'sku' => 'HLTH-001', 'short_description' => 'Daily multivitamin gummies 60 count',            'price' => 15.99],
            ['name' => 'Fish Oil Omega-3',                 'sku' => 'HLTH-002', 'short_description' => 'Pure omega-3 fish oil capsules 120 count',       'price' => 21.99],
            ['name' => 'Herbal Green Tea',                 'sku' => 'HLTH-003', 'short_description' => 'Organic detox herbal green tea bags',            'price' => 11.99],
            ['name' => 'Organic Mixed Nuts',               'sku' => 'FOOD-001', 'short_description' => 'Premium roasted mixed nuts 500g pack',            'price' => 13.99],
            ['name' => 'Dark Chocolate Bar',               'sku' => 'FOOD-002', 'short_description' => '72% cocoa artisan dark chocolate',              'price' => 6.99],
            ['name' => 'Sparkling Water Variety Pack',     'sku' => 'FOOD-003', 'short_description' => '12-pack assorted flavor sparkling water',        'price' => 9.99],
        ];

        foreach ($products as $index => $data) {
            $product = Product::create([
                'category_id'       => $categoryIds[array_rand($categoryIds)],
                'brand_id'          => $brandIds[array_rand($brandIds)],
                'name'              => $data['name'],
                'slug'              => Str::slug($data['name']),
                'sku'               => $data['sku'],
                'short_description' => $data['short_description'],
                'price'             => $data['price'],
                'stock'             => rand(5, 200),
                'status'            => true,
            ]);

            $imageContent = file_get_contents("https://picsum.photos/seed/product{$index}/600/400");

            if ($imageContent !== false) {
                $fileName = 'product_' . ($index + 1) . '.jpg';
                $filePath = 'products/' . $fileName;
                $fullPath = storage_path('app/public/' . $filePath);

                if (!is_dir(dirname($fullPath))) {
                    mkdir(dirname($fullPath), 0755, true);
                }

                file_put_contents($fullPath, $imageContent);

                $product->media()->create([
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
