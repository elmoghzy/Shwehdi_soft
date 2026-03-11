<?php

namespace App\Http\Controllers;

use App\Models\Bundle;

class BundleController extends Controller
{
    public function __invoke()
    {
        $bundles = Bundle::query()
            ->with(['products:id,name,slug,main_image'])
            ->latest('id')
            ->paginate(9);

        return view('pages.bundles.index', [
            'bundles' => $bundles,
        ]);
    }
}
