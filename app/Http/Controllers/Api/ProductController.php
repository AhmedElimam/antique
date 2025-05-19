<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->where('is_active', true);

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        $products = $query->paginate(12);
        return response()->json($products);
    }

    public function show(Product $product)
    {
        return response()->json($product->load('category'));
    }
} 