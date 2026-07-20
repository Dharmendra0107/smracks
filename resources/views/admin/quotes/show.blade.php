@extends('admin.layout')

@section('title', 'Quote Request #' . $quote->id)

@section('content')

<div class="row g-3">
  <div class="col-lg-8">
    <div class="admin-card">
      <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
          <h3 style="font-size:1.2rem; color:var(--steel-900); margin:0;">{{ $quote->name }}</h3>
          <p style="color:var(--steel-500); font-size:0.85rem; margin:0.2rem 0 0;">Submitted {{ $quote->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <span class="status-badge status-{{ $quote->status }}">{{ ucfirst($quote->status) }}</span>
      </div>

      <table class="admin-table">
        <tr><th style="width:160px;">Phone</th><td><a href="tel:{{ $quote->phone }}" style="color:var(--steel-900);">{{ $quote->phone }}</a></td></tr>
        @if($quote->email)
        <tr><th>Email</th><td><a href="mailto:{{ $quote->email }}" style="color:var(--steel-900);">{{ $quote->email }}</a></td></tr>
        @endif
        @if($quote->company)
        <tr><th>Company</th><td>{{ $quote->company }}</td></tr>
        @endif
        <tr><th>Quantity</th><td>{{ $quote->quantity }}</td></tr>
        @if($quote->product)
        <tr><th>Product</th><td>{{ $quote->product }}</td></tr>
        @endif
        @if($quote->rack_type)
        <tr><th>Rack Type</th><td>{{ $quote->rack_type }}</td></tr>
        @endif
        @if($quote->delivery_city)
        <tr><th>Delivery City</th><td>{{ $quote->delivery_city }}</td></tr>
        @endif
        @if($quote->message)
        <tr><th>Message</th><td>{{ $quote->message }}</td></tr>
        @endif
      </table>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="admin-card mb-3">
      <h5 style="font-size:0.95rem; color:var(--steel-900); margin-bottom:1rem;">Update Status</h5>
      <form method="POST" action="{{ route('admin.quotes.status', $quote) }}">
        @csrf @method('PATCH')
        <select name="status" class="form-control-custom">
          <option value="new" {{ $quote->status === 'new' ? 'selected' : '' }}>New</option>
          <option value="contacted" {{ $quote->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
          <option value="closed" {{ $quote->status === 'closed' ? 'selected' : '' }}>Closed</option>
        </select>
        <button type="submit" class="btn-ember w-100">Update</button>
      </form>
    </div>

    <div class="admin-card mb-3">
      <h5 style="font-size:0.95rem; color:var(--steel-900); margin-bottom:1rem;">Quick Actions</h5>
      <a href="tel:{{ $quote->phone }}" class="btn-outline-custom w-100 mb-2" style="text-decoration:none; display:block; text-align:center;"><i class="fa-solid fa-phone me-1"></i> Call</a>
      <a href="https://wa.me/91{{ preg_replace('/\D/', '', $quote->phone) }}" target="_blank" class="btn-outline-custom w-100" style="text-decoration:none; display:block; text-align:center;"><i class="fa-brands fa-whatsapp me-1"></i> WhatsApp</a>
    </div>

    <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}" onsubmit="return confirm('Delete this quote request permanently?');">
      @csrf @method('DELETE')
      <button type="submit" class="btn-danger-custom w-100">Delete Request</button>
    </form>
  </div>
</div>

@endsection