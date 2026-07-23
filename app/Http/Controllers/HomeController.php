<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Homepage. Category cards are still static HTML in home.blade.php
     * (not a @foreach loop yet), but the price line shown on each card
     * is real — pulled from the products table so it always reflects
     * actual seeded stock instead of being hand-typed and going stale.
     */
    public function index()
    {
        $categoryPricing = $this->categoryPricingSummary();
        $specCards = $this->specCardProducts();

        return view('home', compact('categoryPricing', 'specCards'));
    }

    /**
     * Hand-picked products shown in the detailed IndiaMART-style spec
     * card section — one from each of the new categories plus a
     * classic warehouse rack, so all the newly added pricing/specs
     * data gets real visibility on the homepage.
     */
    protected function specCardProducts()
    {
        return Product::query()
            ->active()
            ->whereIn('slug', [
                'display-rack-7ft',
                'channel-rack-7ft',
                'both-side-rack-5ft',
                'industrial-pallet-rack',
            ])
            ->get()
            ->sortBy(fn ($p) => array_search($p->slug, [
                'display-rack-7ft', 'channel-rack-7ft', 'both-side-rack-5ft', 'industrial-pallet-rack',
            ]))
            ->values();
    }

    /**
     * Builds a short price-summary string per category, e.g.
     * "From ₹1,700 / Running Ft" or "₹130 – ₹150 per kg" or
     * "Coming Soon" — whatever fits the data in that category.
     * Categories with no active products return null (card shows
     * no price line, same as before).
     */
    protected function categoryPricingSummary(): array
    {
        $products = Product::query()->active()->get()->groupBy('cat');
        $summary = [];

        foreach ($products as $cat => $items) {
            // If every product in this category shares the same
            // price_note (e.g. all "Coming Soon", or the one Slotted
            // Angle entry with its per-kg range), just show that.
            $notes = $items->pluck('price_note')->filter()->unique();
            if ($notes->count() === 1 && $notes->count() === $items->count()) {
                $summary[$cat] = $notes->first();
                continue;
            }

            // Otherwise summarize the numeric prices actually set.
            $priced = $items->whereNotNull('price');
            if ($priced->isEmpty()) {
                continue;
            }

            $min = $priced->min('price');
            $max = $priced->max('price');
            $unit = $priced->first()->price_unit;
            $unitSuffix = $unit ? ' / ' . $unit : '';

            $summary[$cat] = $min === $max
                ? '₹' . number_format($min) . $unitSuffix
                : 'From ₹' . number_format($min) . $unitSuffix;
        }

        return $summary;
    }
}