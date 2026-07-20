@extends('admin.layout')

@section('title', 'Products')

@section('topbar-actions')
  <a href="{{ route('admin.products.create') }}" class="btn-ember" style="text-decoration:none; display:inline-block;"><i class="fa-solid fa-plus me-1"></i> Add Product</a>
@endsection

@section('content')

<div class="admin-card mb-3">
  <form method="GET" class="d-flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" class="form-control-custom" style="margin:0;" placeholder="Search products by name...">
    <button type="submit" class="btn-outline-custom" style="flex-shrink:0;">Search</button>
  </form>
</div>

<div class="admin-card">
  @if($products->isEmpty())
    <p style="color:var(--steel-600); font-size:0.9rem; margin:0;">No products found.</p>
  @else
    <div style="overflow-x:auto;">
      <table class="admin-table">
        <thead>
          <tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th>Status</th><th></th></tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
              <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:48px; height:48px; object-fit:cover; border-radius:4px; background:var(--steel-100);"></td>
              <td>
                <div style="font-weight:600; color:var(--steel-900);">{{ $product->name }}</div>
                <div style="font-size:0.78rem; color:var(--steel-400);">/{{ $product->slug }}</div>
              </td>
              <td>{{ $product->cat_label }}</td>
              <td>₹{{ number_format($product->price) }}</td>
              <td>
                @if($product->is_active)
                  <span class="status-badge status-closed">Active</span>
                @else
                  <span class="status-badge" style="background:var(--steel-100); color:var(--steel-600);">Hidden</span>
                @endif
              </td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('products.show', $product) }}" target="_blank" class="btn-outline-custom" style="text-decoration:none; display:inline-block;" title="View on site"><i class="fa-solid fa-eye"></i></a>
                  <a href="{{ route('admin.products.edit', $product) }}" class="btn-outline-custom" style="text-decoration:none; display:inline-block;"><i class="fa-solid fa-pen"></i></a>
                  <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete {{ $product->name }}? This cannot be undone.');">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-danger-custom"><i class="fa-solid fa-trash"></i></button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-3">{{ $products->links() }}</div>
  @endif
</div>

@endsection