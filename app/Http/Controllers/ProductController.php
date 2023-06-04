<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::withCount('bookings')
            ->select(['id', 'title', 'type', 'description', 'capacity'])
            ->paginate(10);

        $products->each(function ($product) {
            $product->available = $product->isAvailable();
        });

        return response()->json([
            'data' => $products,
        ]);
    }
}
