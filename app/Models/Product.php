<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug', 'name', 'desc', 'cat', 'cat_label', 'badge',
        'image', 'images', 'price', 'price_unit', 'price_note',
        'old_price', 'specs', 'is_active',
    ];

    protected $casts = [
        'specs' => 'array',
        'images' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Route-model binding by slug instead of id, so
     * Route::get('/products/{product:slug}', ...) works directly
     * and controllers can type-hint Product $product.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Formatted price for display, handling every pricing style in
     * use across the catalog:
     *   - price_note set        → shown verbatim (e.g. "Coming Soon",
     *                              "₹130 – ₹150 per kg")
     *   - price + price_unit    → "₹1,900 / Running Ft"
     *   - price only            → "₹4,200" (flat per-unit, old style)
     *   - nothing set           → "Contact for Pricing"
     */
    public function getDisplayPriceAttribute(): string
    {
        if ($this->price_note) {
            return $this->price_note;
        }

        if (is_null($this->price)) {
            return 'Contact for Pricing';
        }

        $formatted = '₹' . number_format($this->price);

        return $this->price_unit ? $formatted . ' / ' . $this->price_unit : $formatted;
    }

    /**
     * Whether this product should show the old-style strikethrough
     * price + discount badge. Only makes sense for flat per-unit
     * pricing with a genuine old_price set — running-foot/per-kg/
     * coming-soon items never show a discount badge.
     */
    public function getHasDiscountAttribute(): bool
    {
        return !$this->price_note
            && !$this->price_unit
            && $this->price
            && $this->old_price
            && $this->old_price > $this->price;
    }

    /** Discount percentage, computed on the fly — no need to store it. */
    public function getDiscountPercentAttribute(): int
    {
        if (!$this->has_discount) {
            return 0;
        }

        return (int) round((1 - $this->price / $this->old_price) * 100);
    }

    /**
     * All images for this product — the primary `image` first,
     * followed by any extras in the `images` json column. Falls
     * back to just the primary image if no extras are set.
     */
    public function getGalleryImagesAttribute(): array
    {
        return array_values(array_filter(array_merge([$this->image], $this->images ?? [])));
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCategory($query, ?string $cat)
    {
        return $query->when($cat, fn ($q) => $q->where('cat', $cat));
    }
}