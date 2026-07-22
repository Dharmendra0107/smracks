<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Real-world rack pricing turned out to be more varied than a flat
     * "₹X per unit" model: some lines price per running foot, some per
     * kg with a range, and some don't have a price yet ("coming soon").
     * Rather than force all of that into the old price/old_price
     * columns, this adds a couple of nullable columns that let a
     * product opt into whichever display makes sense:
     *
     *   - price + price_unit        → "₹1,900 / Running Ft"
     *   - price_note (overrides)    → "₹130 – ₹150 per kg" or "Coming Soon"
     *   - images (json array)       → extra photos beyond the primary `image`
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('price_unit')->nullable()->after('price');   // e.g. "Running Ft", "kg", null = flat per-unit
            $table->string('price_note')->nullable()->after('price_unit'); // free-text override, e.g. "Coming Soon"
            $table->json('images')->nullable()->after('image');          // additional photos beyond the primary `image`

            $table->unsignedInteger('price')->nullable()->change();
            $table->unsignedInteger('old_price')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price_unit', 'price_note', 'images']);
            $table->unsignedInteger('price')->nullable(false)->change();
            $table->unsignedInteger('old_price')->nullable(false)->change();
        });
    }
};