@extends('admin.layout')

@section('title', 'Quote Requests')

@section('content')

<div class="d-flex gap-2 mb-3 flex-wrap">
  <a href="{{ route('admin.quotes.index') }}" class="{{ !$status ? 'btn-ember' : 'btn-outline-custom' }}" style="text-decoration:none; display:inline-block;">All ({{ $counts['all'] }})</a>
  <a href="{{ route('admin.quotes.index', ['status' => 'new']) }}" class="{{ $status === 'new' ? 'btn-ember' : 'btn-outline-custom' }}" style="text-decoration:none; display:inline-block;">New ({{ $counts['new'] }})</a>
  <a href="{{ route('admin.quotes.index', ['status' => 'contacted']) }}" class="{{ $status === 'contacted' ? 'btn-ember' : 'btn-outline-custom' }}" style="text-decoration:none; display:inline-block;">Contacted ({{ $counts['contacted'] }})</a>
  <a href="{{ route('admin.quotes.index', ['status' => 'closed']) }}" class="{{ $status === 'closed' ? 'btn-ember' : 'btn-outline-custom' }}" style="text-decoration:none; display:inline-block;">Closed ({{ $counts['closed'] }})</a>
</div>

<div class="admin-card">
  @if($quotes->isEmpty())
    <p style="color:var(--steel-600); font-size:0.9rem; margin:0;">No quote requests here.</p>
  @else
    <div style="overflow-x:auto;">
      <table class="admin-table">
        <thead>
          <tr><th>Name</th><th>Phone</th><th>Product / Rack Type</th><th>Qty</th><th>Status</th><th>Received</th><th></th></tr>
        </thead>
        <tbody>
          @foreach($quotes as $quote)
            <tr>
              <td>{{ $quote->name }}</td>
              <td>{{ $quote->phone }}</td>
              <td>{{ $quote->product ?? $quote->rack_type ?? '—' }}</td>
              <td>{{ $quote->quantity }}</td>
              <td><span class="status-badge status-{{ $quote->status }}">{{ ucfirst($quote->status) }}</span></td>
              <td>{{ $quote->created_at->format('d M, h:i A') }}</td>
              <td><a href="{{ route('admin.quotes.show', $quote) }}" class="btn-outline-custom" style="text-decoration:none; display:inline-block;">View</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-3">{{ $quotes->links() }}</div>
  @endif
</div>

@endsection