<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HardwareCatalogController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        $query = Product::query()
            ->with('category:id,name,slug')
            ->latest('id');

        $activeCategory = null;
        if ($request->filled('category')) {
            $activeCategory = $request->input('category');
            $query->whereHas('category', fn ($q) => $q->where('slug', $activeCategory));
        }

        $search = $request->input('q');
        if ($search) {
            $query->where(fn ($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('brand', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%"));
        }

        $products = $query->paginate(12)->withQueryString();

        return view('pages.hardware.index', [
            'categories'     => $categories,
            'products'       => $products,
            'activeCategory' => $activeCategory,
            'search'         => $search,
        ]);
    }

    public function show(Product $product)
    {
        $product->load([
            'category:id,name,slug',
            'bundles:id,name,slug,price',
        ]);

        $relatedProducts = Product::query()
            ->where('category_id', $product->category_id)
            ->whereKeyNot($product->id)
            ->latest('id')
            ->take(4)
            ->get();

        return view('pages.hardware.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
