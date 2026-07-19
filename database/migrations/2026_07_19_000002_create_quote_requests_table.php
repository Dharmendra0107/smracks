<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->unsignedInteger('quantity');
            $table->text('message')->nullable();
            $table->string('product')->nullable();       // product name, if submitted from a product page
            $table->string('company')->nullable();       // bulk-order form only
            $table->string('delivery_city')->nullable(); // bulk-order form only
            $table->string('rack_type')->nullable();     // bulk-order form only
            $table->string('status')->default('new');    // new | contacted | closed — for a future admin inbox
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};