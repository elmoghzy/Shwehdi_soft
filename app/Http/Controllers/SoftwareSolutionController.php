<?php

namespace App\Http\Controllers;

use App\Models\Product;

class SoftwareSolutionController extends Controller
{
    public function __invoke()
    {
        $softwareProducts = Product::query()
            ->with('category:id,name,slug')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'software')->orWhere('name', 'like', '%soft%');
            })
            ->latest('id')
            ->get();

        return view('pages.software-solutions', [
            'softwareProducts' => $softwareProducts,
        ]);
    }
}
