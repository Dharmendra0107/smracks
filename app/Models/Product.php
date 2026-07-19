<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug', 'name', 'desc', 'cat', 'cat_label', 'badge',
        'image', 'price', 'old_price', 'specs', 'is_active',
    ];

    protected $casts = [
        'specs' => 'array',
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

    /** Discount percentage, computed on the fly — no need to store it. */
    public function getDiscountPercentAttribute(): int
    {
        if (!$this->old_price) {
            return 0;
        }

        return (int) round((1 - $this->price / $this->old_price) * 100);
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