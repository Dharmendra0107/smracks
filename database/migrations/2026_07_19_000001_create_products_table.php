<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->text('desc');
            $table->string('cat');           // category slug, e.g. 'supermarket'
            $table->string('cat_label');     // display name, e.g. 'Supermarket Rack'
            $table->string('badge')->nullable(); // e.g. 'Best Seller', 'New', null
            $table->string('image');         // filename in public/images/
            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price');
            $table->json('specs')->nullable(); // ['Dimensions' => '...', 'Load Capacity' => '...']
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('cat');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};