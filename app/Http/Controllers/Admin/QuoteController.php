<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $quotes = QuoteRequest::query()
            ->when($status, fn ($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $counts = [
            'all' => QuoteRequest::count(),
            'new' => QuoteRequest::where('status', 'new')->count(),
            'contacted' => QuoteRequest::where('status', 'contacted')->count(),
            'closed' => QuoteRequest::where('status', 'closed')->count(),
        ];

        return view('admin.quotes.index', compact('quotes', 'status', 'counts'));
    }

    public function show(QuoteRequest $quote)
    {
        // Viewing a "new" request marks it as contacted automatically —
        // keeps the "new" count meaningful as an unread indicator.
        if ($quote->status === 'new') {
            $quote->update(['status' => 'contacted']);
        }

        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(Request $request, QuoteRequest $quote)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,closed',
        ]);

        $quote->update(['status' => $request->status]);

        return back()->with('success', 'Status updated.');
    }

    public function destroy(QuoteRequest $quote)
    {
        $quote->delete();

        return redirect()->route('admin.quotes.index')->with('success', 'Quote request deleted.');
    }
}