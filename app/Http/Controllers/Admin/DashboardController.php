<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\QuoteRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalQuotes = QuoteRequest::count();
        $newQuotes = QuoteRequest::where('status', 'new')->count();
        $recentQuotes = QuoteRequest::latest()->take(6)->get();

        // Breakdown of where inquiries are coming from — quick view
        // of which pages/forms are actually driving customer contact.
        $sourceBreakdown = QuoteRequest::query()
            ->selectRaw("COALESCE(source, 'Website') as source, count(*) as total")
            ->groupBy('source')
            ->orderByDesc('total')
            ->get();

        return view('admin.dashboard', compact('totalProducts', 'totalQuotes', 'newQuotes', 'recentQuotes', 'sourceBreakdown'));
    }
}