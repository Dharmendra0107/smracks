<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Support\RackCategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $cat = $request->query('cat');
        $feature = $request->query('feature'); // TODO: not yet a real column — add a `features` json column + whereJsonContains() when needed.

        $categoryNames = RackCategories::names();
        $categoryDescriptions = RackCategories::descriptions();
        $categoriesWithoutStock = RackCategories::withoutStock();

        if ($cat && in_array($cat, $categoriesWithoutStock)) {
            $products = collect(); // made-to-order category — no query needed, straight to empty state.
        } else {
            $products = Product::query()
                ->active()
                ->category($cat)
                ->latest()
                ->get();
        }

        $pageTitle = $cat && isset($categoryNames[$cat]) ? $categoryNames[$cat] : 'Our Rack Collection';
        $pageDescription = $cat && isset($categoryDescriptions[$cat])
            ? $categoryDescriptions[$cat]
            : 'Browse supermarket, slotted angle, warehouse & storage racks — all custom-built and ready to ship pan-India.';

        // Per-category counts for the filter sidebar. Real query,
        // naturally reflects whatever categories actually have
        // active stock — no hardcoded category list to maintain.
        $categoryCounts = Product::query()
            ->active()
            ->selectRaw('cat, count(*) as total')
            ->groupBy('cat')
            ->pluck('total', 'cat')
            ->toArray();

        return view('products.index', compact(
            'products', 'cat', 'feature', 'pageTitle', 'pageDescription',
            'categoryNames', 'categoryCounts'
        ));
    }

    /**
     * Single product detail page. Uses route-model binding
     * (Product::getRouteKeyName() returns 'slug') so Laravel
     * resolves {product} straight into a Product instance —
     * a non-existent slug automatically 404s, no manual
     * abort_if() needed anymore.
     */
    public function show(Product $product)
    {
        $related = Product::query()
            ->active()
            ->where('cat', $product->cat)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $categoryNames = RackCategories::names();

        return view('products.show', compact('product', 'related', 'categoryNames'));
    }
}