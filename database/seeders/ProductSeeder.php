<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $products = [
            [
                'name' => 'Nordic Chair',
                'slug' => 'nordic-chair',
                'description' => 'A beautiful Nordic-style chair that combines comfort with minimalist design.',
                'price' => 299.99,
                'final_price' => 299.99,
                'images' => ['images/product-1.png'],
                'stock' => 10,
                'sku' => 'NC-001',
                'category_id' => $categories[0]->id ?? 1,
            ],
            [
                'name' => 'Kruzo Aero Chair',
                'slug' => 'kruzo-aero-chair',
                'description' => 'Modern ergonomic chair perfect for your home office.',
                'price' => 399.99,
                'final_price' => 399.99,
                'images' => ['images/product-2.png'],
                'stock' => 15,
                'sku' => 'KAC-002',
                'category_id' => $categories[1]->id ?? 1,
            ],
            [
                'name' => 'Ergonomic Chair',
                'slug' => 'ergonomic-chair',
                'description' => 'Designed for maximum comfort during long working hours.',
                'price' => 349.99,
                'final_price' => 349.99,
                'images' => ['images/product-3.png'],
                'stock' => 8,
                'sku' => 'EC-003',
                'category_id' => $categories[2]->id ?? 1,
            ],
            [
                'name' => 'Modern Sofa',
                'slug' => 'modern-sofa',
                'description' => 'Elegant and comfortable sofa for your living room.',
                'price' => 899.99,
                'final_price' => 899.99,
                'images' => ['images/couch.png'],
                'stock' => 5,
                'sku' => 'MS-004',
                'category_id' => $categories[3]->id ?? 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
