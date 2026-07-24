<?php

namespace App\View\Composers;

use App\Models\Product;
use App\Support\RackCategories;
use Illuminate\View\View;

/**
 * Feeds the "Categories" dropdown in the navbar on every page,
 * without every controller needing to remember to pass it in.
 * Registered against the navbar partial in AppServiceProvider.
 */
class NavbarComposer
{
    public function compose(View $view): void
    {
        $names = RackCategories::names();
        $icons = RackCategories::icons();

        $counts = Product::query()
            ->active()
            ->selectRaw('cat, count(*) as total')
            ->groupBy('cat')
            ->pluck('total', 'cat');

        $categories = collect($names)->map(function ($label, $slug) use ($icons, $counts) {
            return [
                'slug' => $slug,
                'label' => $label,
                'icon' => $icons[$slug] ?? 'fa-warehouse',
                'count' => $counts[$slug] ?? 0,
            ];
        })->values();

        $view->with('navCategories', $categories);
    }
}