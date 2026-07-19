@extends('layouts.app')

{{-- =========================================================
     SEO — fully dynamic per product.
========================================================= --}}
@section('title', $product->name . ' | ' . $product->cat_label . ' - SM Racks')
@section('meta_description', $product->desc . ' Buy from SM Racks — custom sizes, bulk pricing, pan-India delivery.')
@section('meta_keywords', strtolower($product->name) . ', ' . strtolower($product->cat_label) . ' price, SM Racks')
@section('og_type', 'product')
@section('og_image', asset('images/' . $product->image))

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Product",
  "name": "{{ $product->name }}",
  "description": "{{ $product->desc }}",
  "image": "{{ asset('images/' . $product->image) }}",
  "sku": "{{ strtoupper(str_replace('-', '', substr($product->slug, 0, 8))) }}",
  "brand": {"@@type": "Brand", "name": "SM Racks"},
  "offers": {
    "@@type": "Offer",
    "url": "{{ url()->current() }}",
    "priceCurrency": "INR",
    "price": "{{ $product->price }}",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@@type":"ListItem","position":2,"name":"Products","item":"{{ route('products.index') }}"},
    {"@@type":"ListItem","position":3,"name":"{{ $product->cat_label }}","item":"{{ route('products.index', ['cat' => $product->cat]) }}"},
    {"@@type":"ListItem","position":4,"name":"{{ $product->name }}","item":"{{ url()->current() }}"}
  ]
}
</script>
@endpush

@push('styles')
/* =========================================================
   PRODUCT DETAIL PAGE — page-specific CSS only.
========================================================= */
.breadcrumb-bar{background:var(--steel-900); padding:6.5rem 0 1.3rem;}
.breadcrumb-bar .breadcrumb-custom{margin:0;}

.product-section{padding:3.5rem 0;}

/* ---- Gallery ---- */
.gallery-main{
  background:var(--steel-100);
  border:1px solid var(--steel-200);
  border-radius:4px;
  overflow:hidden;
  height:440px;
  position:relative;
  margin-bottom:1rem;
}
.gallery-main img{width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;}
.gallery-main:hover img{transform:scale(1.05);}
.gallery-badge{
  position:absolute; top:1rem; left:1rem; background:var(--steel-900); color:var(--ember-400);
  font-family:var(--font-display); font-size:0.7rem; letter-spacing:0.08em; text-transform:uppercase;
  padding:0.35rem 0.8rem; border-radius:2px; z-index:2;
}

/* ---- Product info ---- */
.product-cat-label{font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.1em; text-transform:uppercase; color:var(--ember-600); margin-bottom:0.5rem; display:inline-block;}
.product-title{font-size:clamp(1.6rem,3vw,2.2rem); color:var(--steel-900); font-weight:700; margin-bottom:0.6rem;}
.product-rating{color:var(--ember-500); font-size:0.85rem; margin-bottom:1rem;}
.product-rating span{color:var(--steel-600); margin-left:0.4rem;}
.product-price-block{
  display:flex; align-items:baseline; gap:0.8rem; margin-bottom:1.4rem; padding-bottom:1.4rem; border-bottom:1px dashed var(--steel-200);
}
.product-price{font-family:var(--font-display); font-size:2rem; font-weight:800; color:var(--steel-900);}
.product-price-old{font-size:1.1rem; color:var(--steel-400); text-decoration:line-through;}
.product-discount-badge{background:rgba(240,83,15,0.1); color:var(--ember-600); font-family:var(--font-display); font-size:0.75rem; padding:0.3rem 0.6rem; border-radius:2px;}
.product-desc{color:var(--steel-600); font-size:0.95rem; margin-bottom:1.5rem; line-height:1.7;}

.spec-mini-table{width:100%; margin-bottom:1.5rem;}
.spec-mini-table tr{border-bottom:1px solid var(--steel-100);}
.spec-mini-table td{padding:0.6rem 0; font-size:0.88rem;}
.spec-mini-table td:first-child{color:var(--steel-600); width:40%;}
.spec-mini-table td:last-child{color:var(--steel-900); font-weight:600;}

.qty-selector{display:flex; align-items:center; border:1px solid var(--steel-200); border-radius:2px; width:fit-content;}
.qty-selector button{background:none; border:none; width:40px; height:44px; font-size:1.1rem; color:var(--steel-700);}
.qty-selector input{width:50px; text-align:center; border:none; border-left:1px solid var(--steel-200); border-right:1px solid var(--steel-200); height:44px; font-family:var(--font-display); font-weight:600;}

.trust-mini{display:flex; gap:1.8rem; margin-top:1.8rem; flex-wrap:wrap;}
.trust-mini-item{display:flex; align-items:center; gap:0.5rem; font-size:0.82rem; color:var(--steel-600);}
.trust-mini-item i{color:var(--ember-500);}

/* ---- Tabs ---- */
.tabs-section{margin-top:3.5rem;}
.nav-tabs-custom{border-bottom:2px solid var(--steel-200); gap:0.5rem;}
.nav-tabs-custom .nav-link{
  font-family:var(--font-display); font-size:0.85rem; letter-spacing:0.06em; text-transform:uppercase;
  color:var(--steel-600); border:none; border-bottom:3px solid transparent; border-radius:0; padding:0.9rem 0.3rem; margin-right:2rem;
}
.nav-tabs-custom .nav-link.active{color:var(--ember-600); border-bottom-color:var(--ember-500); background:none;}
.tab-content-custom{padding:2rem 0; color:var(--steel-700); font-size:0.95rem; line-height:1.8;}
.tab-content-custom h6{font-family:var(--font-display); color:var(--steel-900); margin-top:1.2rem; margin-bottom:0.6rem; font-size:0.95rem; text-transform:uppercase;}
.spec-table{width:100%;}
.spec-table tr{border-bottom:1px solid var(--steel-100);}
.spec-table td{padding:0.7rem 0.5rem; font-size:0.9rem;}
.spec-table td:first-child{color:var(--steel-600); font-weight:500; width:35%;}
.spec-table td:last-child{color:var(--steel-900);}
.spec-table tr:nth-child(odd){background:var(--steel-100);}

/* ---- Quote form ---- */
.quote-form-card{background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:2rem;}
.quote-form-card h4{color:var(--steel-900); font-size:1.2rem; margin-bottom:0.4rem;}
.quote-form-card p{color:var(--steel-600); font-size:0.88rem; margin-bottom:1.4rem;}
.form-control-custom{
  border:1px solid var(--steel-200); border-radius:2px; padding:0.65rem 0.9rem; font-size:0.9rem; width:100%; margin-bottom:1rem;
}
.form-control-custom:focus{outline:none; border-color:var(--ember-500);}

/* ---- Related products ---- */
.related-section{padding:4rem 0 6rem; background:var(--steel-100);}

@media(max-width:767px){
  .gallery-main{height:300px;}
}
@endpush

@section('content')

<div class="breadcrumb-bar">
  <div class="container">
    <p class="breadcrumb-custom">
      <a href="{{ route('home') }}">Home</a><span class="sep">/</span>
      <a href="{{ route('products.index') }}">Products</a><span class="sep">/</span>
      <a href="{{ route('products.index', ['cat' => $product->cat]) }}">{{ $product->cat_label }}</a><span class="sep">/</span>
      <span style="color:var(--ember-400);">{{ $product->name }}</span>
    </p>
  </div>
</div>

<section class="product-section">
  <div class="container">
    <div class="row g-5">

      {{-- GALLERY — single hero image for now (our data model only
           has one photo per product). Swap this block for a real
           thumbnail-swap gallery once $product has an `images` array. --}}
      <div class="col-lg-6">
        <div class="gallery-main">
          @if($product->badge)
            <span class="gallery-badge">{{ $product->badge }}</span>
          @endif
          <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
      </div>

      {{-- INFO --}}
      <div class="col-lg-6">
        <span class="product-cat-label">{{ $product->cat_label }}</span>
        <h1 class="product-title">{{ $product->name }}</h1>
        <div class="product-rating">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
          <span>4.6 (128 reviews) &nbsp;|&nbsp; SKU: {{ strtoupper(str_replace('-', '', substr($product->slug, 0, 8))) }}</span>
        </div>
        <div class="product-price-block">
          <span class="product-price">₹{{ number_format($product->price) }}</span>
          <span class="product-price-old">₹{{ number_format($product->old_price) }}</span>
          <span class="product-discount-badge">{{ $product->discount_percent }}% OFF</span>
        </div>
        <p class="product-desc">{{ $product->desc }} Built from high-tensile steel with a durable powder-coated finish — fabricated in-house and ready for pan-India dispatch.</p>

        @if(!empty($product->specs))
          <table class="spec-mini-table">
            @foreach(array_slice($product->specs, 0, 4) as $label => $value)
              <tr><td>{{ $label }}</td><td>{{ $value }}</td></tr>
            @endforeach
          </table>
        @endif

        <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
          <div class="qty-selector">
            <button type="button" id="qtyMinus">&minus;</button>
            <input type="text" id="qtyInput" value="1" inputmode="numeric">
            <button type="button" id="qtyPlus">+</button>
          </div>
          <a href="#quote" class="btn btn-ember">Request Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          <a href="tel:+916394309204" class="btn btn-outline-dark-custom"><i class="fa-solid fa-phone me-1"></i> Call to Order</a>
        </div>

        <div class="trust-mini">
          <div class="trust-mini-item"><i class="fa-solid fa-truck-fast"></i> Pan-India Delivery</div>
          <div class="trust-mini-item"><i class="fa-solid fa-shield-halved"></i> {{ $product->specs['Warranty'] ?? '2 Year Warranty' }}</div>
          <div class="trust-mini-item"><i class="fa-solid fa-tags"></i> Bulk Order Discounts</div>
        </div>
      </div>
    </div>

    {{-- TABS --}}
    <div class="tabs-section">
      <ul class="nav nav-tabs-custom" id="productTabs">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Overview</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#specifications">Specifications</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#applications">Applications</button></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active tab-content-custom" id="overview">
          <p>The {{ $product->name }} is engineered for {{ strtolower($product->cat_label) }} environments that demand both durability and flexibility. Every unit is fabricated in-house using premium steel, precision cut, and finished with a scratch-resistant powder coat that holds up to years of daily handling.</p>
          <h6>Key Features</h6>
          <ul>
            <li>Tool-free shelf height adjustment</li>
            <li>Reinforced corner brackets for added structural rigidity</li>
            <li>Anti-rust, anti-corrosion powder coated finish</li>
            <li>Modular design — link multiple units for longer runs</li>
          </ul>
        </div>
        <div class="tab-pane fade tab-content-custom" id="specifications">
          @if(!empty($product->specs))
            <table class="spec-table">
              @foreach($product->specs as $label => $value)
                <tr><td>{{ $label }}</td><td>{{ $value }}</td></tr>
              @endforeach
            </table>
          @else
            <p>Detailed specifications available on request — contact us for a full spec sheet.</p>
          @endif
        </div>
        <div class="tab-pane fade tab-content-custom" id="applications">
          <p>Ideal for {{ strtolower($product->cat_label) }} setups including retail, storage, and general commercial use. Also suitable for showroom displays and stockrooms requiring frequent restocking.</p>
          <h6>Recommended For</h6>
          <ul>
            <li>{{ $product->cat_label }} installations</li>
            <li>Retail and commercial storage</li>
            <li>Bulk and custom-order fitouts</li>
            <li>Showrooms and product display areas</li>
          </ul>
        </div>
      </div>
    </div>

    {{-- QUOTE FORM --}}
    <div class="row mt-5" id="quote">
      <div class="col-lg-7">
        <div class="quote-form-card reveal">
          <h4>Request a Quote for This Product</h4>
          <p>Fill in your details and our team will get back to you within 24 hours with the best pricing.</p>
          @if(session('quote_success'))
            <div class="alert alert-success" style="border-radius:4px; font-size:0.88rem;">{{ session('quote_success') }}</div>
          @endif
          <form method="POST" action="{{ route('quote.submit') }}">
            @csrf
            <input type="hidden" name="product" value="{{ $product->name }}">
            <div class="row">
              <div class="col-md-6"><input type="text" name="name" value="{{ old('name') }}" class="form-control-custom" placeholder="Your Name*" required></div>
              <div class="col-md-6"><input type="tel" name="phone" value="{{ old('phone') }}" class="form-control-custom" placeholder="Phone Number*" required></div>
            </div>
            <div class="row">
              <div class="col-md-6"><input type="email" name="email" value="{{ old('email') }}" class="form-control-custom" placeholder="Email Address"></div>
              <div class="col-md-6"><input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control-custom" placeholder="Quantity Required*" required></div>
            </div>
            <textarea name="message" class="form-control-custom" rows="4" placeholder="Additional requirements (size, color, delivery location)...">{{ old('message') }}</textarea>
            <button type="submit" class="btn btn-ember w-100">Submit Request <i class="fa-solid fa-paper-plane ms-1"></i></button>
          </form>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="quote-form-card" style="background:var(--steel-900); border:none; height:100%;">
          <h4 style="color:#fff;">Prefer to Talk?</h4>
          <p style="color:var(--steel-400);">Our team is available Mon&ndash;Sat, 9 AM &ndash; 7 PM to help with bulk orders and custom specifications.</p>
          <div class="contact-line" style="color:var(--steel-200);"><i class="fa-solid fa-phone"></i><span>+91 63943 09204, +91 95698 11406</span></div>
          <div class="contact-line" style="color:var(--steel-200);"><i class="fa-solid fa-envelope"></i><span>gauravmishra3851@gmail.com</span></div>
          <div class="contact-line" style="color:var(--steel-200);"><i class="fa-solid fa-location-dot"></i><span>Jankipuram, Lucknow, UP</span></div>
          <a href="https://wa.me/916394309204" target="_blank" rel="noopener noreferrer" class="btn btn-ember w-100 mt-3"><i class="fa-brands fa-whatsapp me-1"></i> Chat on WhatsApp</a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- RELATED PRODUCTS — same category, computed server-side in the controller --}}
@if($related->isNotEmpty())
<section class="related-section">
  <div class="container">
    <div class="mb-4">
      <span class="section-tag">You May Also Like</span>
      <h2 class="section-title">Related Products</h2>
    </div>
    <div class="row g-4">
      @foreach($related as $item)
        <div class="col-sm-6 col-lg-3">
          <div class="product-card reveal">
            <div class="product-img-wrap">
              <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" loading="lazy">
            </div>
            <div class="product-card-body">
              <h5>{{ $item->name }}</h5>
              <div class="product-card-footer">
                <span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹{{ number_format($item->price) }}</span>
                <a href="{{ route('products.show', $item) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const qtyInput = document.getElementById('qtyInput');
    const minus = document.getElementById('qtyMinus');
    const plus = document.getElementById('qtyPlus');

    function step(dir) {
      let val = parseInt(qtyInput.value, 10) || 1;
      val = Math.max(1, val + dir);
      qtyInput.value = val;
    }
    if (minus) minus.addEventListener('click', () => step(-1));
    if (plus) plus.addEventListener('click', () => step(1));
  });
</script>
@endpush