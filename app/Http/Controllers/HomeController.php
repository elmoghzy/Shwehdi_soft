<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $totalProducts = Product::query()->count();
        $inStockProducts = Product::query()
            ->where('is_in_stock', true)
            ->count();

        return view('pages.home', [
            'categoryStats' => Category::query()
                ->withCount('products')
                ->orderByDesc('products_count')
                ->orderBy('name')
                ->take(6)
                ->get(),
            'featuredProducts' => Product::query()
                ->with('category:id,name,slug')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->orderByRaw("CASE WHEN categories.slug = 'printers' THEN 1 ELSE 0 END")
                ->orderByDesc('products.id')
                ->select('products.*')
                ->take(6)
                ->get(),
            'totalProducts' => $totalProducts,
            'inStockProducts' => $inStockProducts,
            'totalCategories' => Category::query()->count(),
        ]);
    }
}
