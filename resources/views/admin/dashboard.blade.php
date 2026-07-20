@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<div class="row g-3 mb-4">
  <div class="col-md-4">
    <div class="admin-card">
      <div style="font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; color:var(--steel-600);">Total Products</div>
      <div style="font-family:var(--font-display); font-size:2.2rem; font-weight:800; color:var(--steel-900);">{{ $totalProducts }}</div>
      <a href="{{ route('admin.products.index') }}" style="font-size:0.82rem; color:var(--ember-600);">Manage products <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="admin-card">
      <div style="font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; color:var(--steel-600);">Total Quote Requests</div>
      <div style="font-family:var(--font-display); font-size:2.2rem; font-weight:800; color:var(--steel-900);">{{ $totalQuotes }}</div>
      <a href="{{ route('admin.quotes.index') }}" style="font-size:0.82rem; color:var(--ember-600);">View all <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="admin-card" style="border-left:3px solid var(--ember-500);">
      <div style="font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; color:var(--steel-600);">New / Unread</div>
      <div style="font-family:var(--font-display); font-size:2.2rem; font-weight:800; color:var(--ember-600);">{{ $newQuotes }}</div>
      <a href="{{ route('admin.quotes.index', ['status' => 'new']) }}" style="font-size:0.82rem; color:var(--ember-600);">Review now <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
</div>

<div class="admin-card">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 style="font-size:1rem; color:var(--steel-900); margin:0;">Recent Quote Requests</h3>
    <a href="{{ route('admin.quotes.index') }}" class="btn-outline-custom" style="text-decoration:none; display:inline-block;">View All</a>
  </div>

  @if($recentQuotes->isEmpty())
    <p style="color:var(--steel-600); font-size:0.9rem;">No quote requests yet — once customers submit the form on the website, they'll show up here.</p>
  @else
    <div style="overflow-x:auto;">
      <table class="admin-table">
        <thead>
          <tr><th>Name</th><th>Phone</th><th>Product / Rack Type</th><th>Qty</th><th>Status</th><th>Received</th><th></th></tr>
        </thead>
        <tbody>
          @foreach($recentQuotes as $quote)
            <tr>
              <td>{{ $quote->name }}</td>
              <td>{{ $quote->phone }}</td>
              <td>{{ $quote->product ?? $quote->rack_type ?? '—' }}</td>
              <td>{{ $quote->quantity }}</td>
              <td><span class="status-badge status-{{ $quote->status }}">{{ ucfirst($quote->status) }}</span></td>
              <td>{{ $quote->created_at->diffForHumans() }}</td>
              <td><a href="{{ route('admin.quotes.show', $quote) }}" class="btn-outline-custom" style="text-decoration:none; display:inline-block;">View</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>

@endsection