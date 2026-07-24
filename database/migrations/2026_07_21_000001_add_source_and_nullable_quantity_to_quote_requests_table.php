<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Two changes to support a unified "all customer contact" inbox:
     *
     *   - `source` records which form/page an inquiry came from
     *     (e.g. "Product Page", "Bulk Order Page", "Contact Us Page")
     *     so the admin panel can show where every query originated.
     *
     *   - `quantity` becomes nullable because the new general Contact
     *     Us form has no quantity field — it's for people asking
     *     questions, not requesting a quote for a specific amount.
     */
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->string('source')->nullable()->after('status');
            $table->unsignedInteger('quantity')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->dropColumn('source');
            $table->unsignedInteger('quantity')->nullable(false)->change();
        });
    }
};