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

        return view('admin.dashboard', compact('totalProducts', 'totalQuotes', 'newQuotes', 'recentQuotes'));
    }
}