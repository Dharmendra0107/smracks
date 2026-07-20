{{-- Shared by admin/products/create.blade.php and admin/products/edit.blade.php --}}

@if($errors->any())
  <div class="alert alert-danger" style="border-radius:4px; font-size:0.85rem;">
    <ul class="mb-0 ps-3">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="row">
  <div class="col-md-8">
    <label class="form-label-custom">Product Name*</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control-custom" required>

    <label class="form-label-custom">Short Description*</label>
    <textarea name="desc" rows="2" class="form-control-custom" required>{{ old('desc', $product->desc) }}</textarea>

    <div class="row">
      <div class="col-md-6">
        <label class="form-label-custom">Category*</label>
        <select name="cat" class="form-control-custom" required id="catSelect">
          @foreach($categories as $slug => $label)
            <option value="{{ $slug }}" data-label="{{ $label }}" {{ old('cat', $product->cat) === $slug ? 'selected' : '' }}>{{ $label }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label-custom">Category Label (shown on product card)*</label>
        <input type="text" name="cat_label" id="catLabelInput" value="{{ old('cat_label', $product->cat_label) }}" class="form-control-custom" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label class="form-label-custom">Price (₹)*</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control-custom" required min="0">
      </div>
      <div class="col-md-6">
        <label class="form-label-custom">Original / Strikethrough Price (₹)*</label>
        <input type="number" name="old_price" value="{{ old('old_price', $product->old_price) }}" class="form-control-custom" required min="0">
      </div>
    </div>

    <label class="form-label-custom">Specifications <span style="color:var(--steel-400); text-transform:none; font-weight:400;">— one per line, format: Label: Value</span></label>
    <textarea name="specs_text" rows="8" class="form-control-custom" style="font-family:monospace; font-size:0.85rem;" placeholder="Overall Dimensions: 900mm (W) x 450mm (D) x 1800mm (H)&#10;Load Capacity: 80kg per shelf&#10;Warranty: 2 years structural warranty">{{ old('specs_text', $product->specs ? collect($product->specs)->map(fn($v, $k) => "{$k}: {$v}")->implode("\n") : '') }}</textarea>
  </div>

  <div class="col-md-4">
    <label class="form-label-custom">Image Filename*</label>
    <input type="text" name="image" value="{{ old('image', $product->image) }}" class="form-control-custom" placeholder="e.g. new-rack.png" required>
    <p style="font-size:0.78rem; color:var(--steel-400); margin-top:-0.6rem; margin-bottom:1rem;">File must already exist in <code>public/images/</code>.</p>

    @if($product->image)
      <img src="{{ asset('images/' . $product->image) }}" alt="Preview" style="width:100%; border-radius:4px; margin-bottom:1rem; background:var(--steel-100);">
    @endif

    <label class="form-label-custom">Badge <span style="color:var(--steel-400); text-transform:none; font-weight:400;">(optional)</span></label>
    <input type="text" name="badge" value="{{ old('badge', $product->badge) }}" class="form-control-custom" placeholder="e.g. Best Seller, New, Popular">

    <div class="form-check mt-2">
      <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
      <label class="form-check-label" for="isActive" style="font-size:0.88rem; color:var(--steel-700);">Active (visible on the website)</label>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mt-3">
  <button type="submit" class="btn-ember">Save Product <i class="fa-solid fa-check ms-1"></i></button>
  <a href="{{ route('admin.products.index') }}" class="btn-outline-custom" style="text-decoration:none; display:inline-flex; align-items:center;">Cancel</a>
</div>

<script>
  // Auto-fill the category label when a category is picked, but only
  // if the label field is still empty/untouched — avoids clobbering
  // a custom label someone already typed.
  document.getElementById('catSelect')?.addEventListener('change', function () {
    const labelInput = document.getElementById('catLabelInput');
    if (!labelInput.value.trim()) {
      labelInput.value = this.options[this.selectedIndex].dataset.label;
    }
  });
</script>