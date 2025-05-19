<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = \App\Models\Product::all();

        foreach ($products as $product) {
            // Add size variants
            $sizes = ['Small', 'Medium', 'Large', 'X-Large'];
            foreach ($sizes as $size) {
                \App\Models\ProductVariant::create([
                    'product_id' => $product->id,
                    'name' => 'Size',
                    'value' => $size,
                    'price_adjustment' => $size === 'X-Large' ? 5.00 : ($size === 'Large' ? 3.00 : 0),
                    'stock' => rand(5, 20),
                    'sku' => $product->sku . '-' . strtoupper(substr($size, 0, 1))
                ]);
            }

            // Add color variants
            $colors = ['Red', 'Blue', 'Black', 'White'];
            foreach ($colors as $color) {
                \App\Models\ProductVariant::create([
                    'product_id' => $product->id,
                    'name' => 'Color',
                    'value' => $color,
                    'price_adjustment' => $color === 'Red' ? 2.00 : 0,
                    'stock' => rand(5, 20),
                    'sku' => $product->sku . '-' . strtoupper(substr($color, 0, 1))
                ]);
            }
        }
    }
}
