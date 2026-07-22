<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Categories that exist on the homepage/nav but don't have any
     * seeded products yet — shown with the "made to order" empty
     * state instead of a blank grid. Once real stock exists in the
     * `products` table for these, remove them from this list (the
     * DB query then naturally returns rows instead of nothing).
     */
    protected function categoriesWithoutStock(): array
    {
        return ['boltless', 'cold-storage', 'office'];
    }

    protected function categoryNames(): array
    {
        return [
            'supermarket'     => 'Supermarket Racks',
            'slotted-angle'   => 'Slotted Angle Racks',
            'warehouse'       => 'Warehouse Racks',
            'storage'         => 'Storage Racks',
            'heavy-duty'      => 'Heavy Duty Racks',
            'boltless'        => 'Boltless Racks',
            'cold-storage'    => 'Cold Storage Racks',
            'office'          => 'Office & Home Racks',
            'display-racks'   => 'Display Racks',
            'channel-rack'    => 'Channel Rack',
            'both-side-racks' => 'Both Side Racks',
        ];
    }

    protected function categoryDescriptions(): array
    {
        return [
            'supermarket'     => 'Display shelving for retail stores, grocery outlets & showrooms — adjustable, powder coated, ready to ship.',
            'slotted-angle'   => 'Bolt-free, adjustable slotted angle racks for offices, homes, godowns & light storage needs.',
            'warehouse'       => 'Heavy-duty pallet & industrial racking built for bulk storage, 3PL facilities & distribution centers.',
            'storage'         => 'Multi-purpose storage racks for godowns, factories & cold storage units — built to last.',
            'heavy-duty'      => 'High load-bearing racks engineered for machinery & bulk material storage.',
            'boltless'        => 'Tool-free, modular racks built for quick assembly & relocation.',
            'cold-storage'    => 'Rust-proof coated racks purpose-built for cold rooms & food storage.',
            'office'          => 'Compact, tidy storage solutions for offices, records rooms & homes.',
            'display-racks'   => 'Panel-mounted display racks in multiple heights — priced per running foot, built for retail floors.',
            'channel-rack'    => 'Channel-frame racking available in multiple heights and panel counts, priced per running foot.',
            'both-side-racks' => 'Double-sided racks for aisle setups — accessible from both faces, maximizing floor space.',
        ];
    }

    public function index(Request $request)
    {
        $cat = $request->query('cat');
        $feature = $request->query('feature'); // TODO: not yet a real column — add a `features` json column + whereJsonContains() when needed.

        $categoryNames = $this->categoryNames();
        $categoryDescriptions = $this->categoryDescriptions();
        $categoriesWithoutStock = $this->categoriesWithoutStock();

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

        $categoryNames = $this->categoryNames();

        return view('products.show', compact('product', 'related', 'categoryNames'));
    }
}