@extends('layouts.app')

{{-- =========================================================
     SEO — dynamic per category. When ?cat= is present, the
     title/description/canonical all shift to target that
     category's search intent instead of the generic listing.
========================================================= --}}
@section('title', $pageTitle . ' | SM Racks')
@section('meta_description', $pageDescription)
@section('meta_keywords', strtolower($pageTitle) . ', metal rack price Lucknow, SM Racks catalog')

{{-- Filtered URLs should canonicalize to themselves (each category
     is genuinely distinct content, worth indexing separately) —
     but if you'd rather consolidate ranking signal onto the plain
     /products page instead, swap this for:
     @section('canonical', route('products.index')) --}}
@section('canonical', url()->current())

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@@type":"ListItem","position":2,"name":"Products","item":"{{ route('products.index') }}"}
    @if($cat)
    ,{"@@type":"ListItem","position":3,"name":"{{ $pageTitle }}","item":"{{ url()->current() }}"}
    @endif
  ]
}
</script>
@if($products->isNotEmpty())
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "ItemList",
  "itemListElement": [
    @foreach($products as $index => $product)
    {
      "@@type": "ListItem",
      "position": {{ $index + 1 }},
      "url": "{{ route('products.show', $product) }}",
      "name": "{{ $product->name }}"
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endif
@endpush

@push('styles')
/* =========================================================
   PRODUCTS PAGE — page-specific CSS only.
   Shared tokens/buttons/page-header/product-card/reveal live
   in layouts/app.blade.php.
========================================================= */
.shop-section{padding:3.5rem 0 6rem;}

/* ---- Filter sidebar (desktop: sticky, mobile: bottom sheet) ---- */
@media(min-width:992px){
  .filter-sidebar{
    position:sticky;
    top:100px;
    align-self:flex-start;
    max-height:calc(100vh - 120px);
    overflow-y:auto; -webkit-overflow-scrolling:touch;
    scrollbar-width:none;
    -ms-overflow-style:none;
  }
  .filter-sidebar::-webkit-scrollbar{display:none;}
}
.filter-card{
  background:#fff;
  border:1px solid var(--steel-200);
  border-radius:4px;
  padding:1.5rem;
  margin-bottom:1.2rem;
}
.filter-card h6{
  font-family:var(--font-display);
  font-size:0.85rem;
  letter-spacing:0.08em;
  text-transform:uppercase;
  color:var(--steel-900);
  margin-bottom:1rem;
  padding-bottom:0.7rem;
  border-bottom:2px solid var(--ember-500);
}
.filter-option{
  display:flex; align-items:center; justify-content:space-between;
  padding:0.5rem 0;
  cursor:pointer;
  font-size:0.92rem;
  color:var(--steel-700);
  text-decoration:none;
}
.filter-option span:first-child{display:flex; align-items:center;}
.filter-option input{accent-color:var(--ember-500); margin-right:0.6rem; pointer-events:none;}
.filter-option .count{color:var(--steel-400); font-size:0.8rem;}
.filter-option:hover{color:var(--ember-600);}
.filter-option.active-filter{color:var(--ember-600); font-weight:600;}
.price-range-inputs{display:flex; gap:0.6rem; align-items:center;}
.price-range-inputs input{
  border:1px solid var(--steel-200); border-radius:2px; padding:0.4rem 0.6rem; font-size:0.85rem; width:100%;
}
.btn-apply-filter{
  background:var(--steel-900); color:#fff; border:none; font-family:var(--font-display);
  font-size:0.78rem; letter-spacing:0.06em; text-transform:uppercase; padding:0.5rem; border-radius:2px; width:100%; margin-top:0.8rem;
}
.btn-apply-filter:hover{background:var(--ember-600); color:#fff;}
.btn-clear-filter{
  background:none; border:1px solid var(--steel-200); color:var(--steel-600); font-family:var(--font-display);
  font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; padding:0.45rem; border-radius:2px; width:100%; margin-top:0.5rem;
}

/* ---- Toolbar ---- */
.shop-toolbar{
  display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem;
  background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:1rem 1.3rem; margin-bottom:1.8rem;
}
.result-count{font-size:0.9rem; color:var(--steel-600);}
.result-count strong{color:var(--steel-900);}
.sort-select{
  border:1px solid var(--steel-200); border-radius:2px; padding:0.45rem 0.8rem; font-size:0.85rem; color:var(--steel-700);
  font-family:var(--font-body);
}
.filter-toggle-btn{
  display:none;
  background:var(--steel-900); color:#fff; border:none; font-family:var(--font-display);
  font-size:0.78rem; letter-spacing:0.06em; text-transform:uppercase; padding:0.55rem 1rem; border-radius:2px;
}
@media(max-width:991px){
  .shop-toolbar{
    position:sticky; top:64px; z-index:50; margin:0 -0.75rem 1rem; border-radius:0;
    border-left:none; border-right:none; padding:0.7rem 0.9rem; justify-content:space-between;
  }
  .result-count{display:none;}
  .sort-select{flex:1;}
  .filter-toggle-btn{display:inline-block;}
}

/* ---- Product card extras used only on this page ---- */
.product-cat-label{
  font-family:var(--font-display); font-size:0.7rem; letter-spacing:0.1em; text-transform:uppercase; color:var(--ember-600); margin-bottom:0.3rem; display:block;
}
.price-tag{font-family:var(--font-display); font-weight:700; color:var(--steel-900);}
.price-tag small{color:var(--steel-400); font-weight:400; font-size:0.7rem; text-transform:uppercase; display:block; letter-spacing:0.05em;}
.price-old-row{display:flex; align-items:center; gap:0.4rem; margin-top:0.15rem;}
.price-old{font-size:0.75rem; color:var(--steel-400); text-decoration:line-through;}
.price-discount{font-size:0.72rem; color:var(--ember-600); font-weight:600;}

/* ---- Pagination ---- */
.pagination-custom{display:flex; justify-content:center; gap:0.5rem; margin-top:3rem;}
.pagination-custom a{
  width:40px; height:40px; display:flex; align-items:center; justify-content:center;
  border:1px solid var(--steel-200); border-radius:2px; color:var(--steel-700);
  font-family:var(--font-display); font-size:0.85rem; transition:all 0.2s ease;
}
.pagination-custom a.active, .pagination-custom a:hover{background:var(--ember-500); color:#fff; border-color:var(--ember-500);}

/* ---- Mobile bottom-sheet filter ---- */
@media(max-width:991px){
  .filter-sidebar{
    display:none;
    position:fixed; inset:auto 0 0 0; z-index:1050;
    background:#fff; max-height:80vh; overflow-y:auto; -webkit-overflow-scrolling:touch;
    border-radius:12px 12px 0 0; box-shadow:0 -8px 30px rgba(0,0,0,0.2);
    padding:1rem 1rem 1.5rem;
  }
  .filter-sidebar.d-block{display:block !important; animation:slideUp 0.25s ease;}
  .filter-sidebar-backdrop{
    display:none; position:fixed; inset:0; background:rgba(20,24,28,0.5); z-index:1049;
  }
  .filter-sidebar-backdrop.show{display:block;}
  .filter-sidebar-handle{width:40px; height:4px; background:var(--steel-200); border-radius:4px; margin:0 auto 1rem;}
  .filter-sidebar .filter-card{margin-bottom:0.8rem;}
  .filter-close-btn{position:absolute; top:1rem; right:1rem; background:var(--steel-100); border:none; width:32px; height:32px; border-radius:50%; color:var(--steel-700);}
  @keyframes slideUp{from{transform:translateY(100%);} to{transform:translateY(0);}}
}
@endpush

@section('content')

{{-- PAGE HEADER — title/description now come from the controller,
     driven by the real ?cat= query param instead of client-side JS
     rewriting the DOM after page load. --}}
<section class="page-header">
  <div class="container">
    <div class="breadcrumb-custom">
      <a href="{{ route('home') }}">Home</a><span class="sep">/</span>
      @if($cat)
        <a href="{{ route('products.index') }}">Products</a><span class="sep">/</span>
        <span style="color:var(--ember-400);">{{ $pageTitle }}</span>
      @else
        <span style="color:var(--ember-400);">Products</span>
      @endif
    </div>
    <h1>{{ $pageTitle }}</h1>
    <p>{{ $pageDescription }}</p>
  </div>
</section>

<section class="shop-section">
  <div class="container">
    <div class="row">

      {{-- SIDEBAR FILTERS — plain links now (server renders the
           filtered result directly), so this works even with
           JavaScript disabled. Only the open/close mobile sheet
           behavior needs JS. --}}
      <div class="filter-sidebar-backdrop" id="filterBackdrop"></div>
      <div class="col-lg-3 filter-sidebar" id="filterSidebar">
        <div class="filter-sidebar-handle d-lg-none"></div>
        <button class="filter-close-btn d-lg-none" id="filterCloseBtn"><i class="fa-solid fa-xmark"></i></button>

        <div class="filter-card">
          <h6>Category</h6>
          @foreach($categoryCounts as $slug => $count)
            <a href="{{ route('products.index', ['cat' => $slug]) }}" class="filter-option {{ $cat === $slug ? 'active-filter' : '' }}">
              <span><input type="checkbox" {{ $cat === $slug ? 'checked' : '' }}> {{ $categoryNames[$slug] }}</span>
              <span class="count">{{ $count }}</span>
            </a>
          @endforeach
          @if($cat)
            <a href="{{ route('products.index') }}" class="filter-option" style="color:var(--ember-600); font-size:0.82rem; margin-top:0.4rem;">
              <span><i class="fa-solid fa-xmark me-1"></i> Clear category</span>
            </a>
          @endif
        </div>

        <div class="filter-card">
          <h6>Material</h6>
          <label class="filter-option"><span><input type="checkbox"> CRCA Steel</span><span class="count">32</span></label>
          <label class="filter-option"><span><input type="checkbox"> Mild Steel (MS)</span><span class="count">28</span></label>
          <label class="filter-option"><span><input type="checkbox"> Powder Coated</span><span class="count">40</span></label>
        </div>

        <div class="filter-card">
          <h6>Price Range</h6>
          <div class="price-range-inputs">
            <input type="text" placeholder="₹ Min">
            <span style="color:var(--steel-400);">—</span>
            <input type="text" placeholder="₹ Max">
          </div>
          <button class="btn-apply-filter">Apply Filter</button>
          <button class="btn-clear-filter">Clear All</button>
        </div>

        <div class="filter-card" style="background:var(--steel-900); border:none;">
          <h6 style="color:#fff; border-color:var(--ember-500);">Need Bulk Pricing?</h6>
          <p style="color:var(--steel-400); font-size:0.85rem; margin-bottom:1rem;">Get special rates on orders above 20 units.</p>
          <a href="{{ route('bulk-order') }}" class="btn btn-ember btn-sm w-100">Request Quote</a>
        </div>
      </div>

      {{-- PRODUCT GRID --}}
      <div class="col-lg-9">
        <div class="shop-toolbar">
          <button class="filter-toggle-btn" id="filterOpenBtn"><i class="fa-solid fa-filter me-1"></i> Filters</button>
          <div class="result-count">
            Showing <strong>{{ $products->count() }}</strong> of <strong>{{ $products->count() }}</strong> products
          </div>
          <select class="sort-select">
            <option>Sort by: Popularity</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
            <option>Newest First</option>
          </select>
        </div>

        @if($products->isNotEmpty())
          <div class="row g-4">
            @foreach($products as $product)
              <div class="col-6 col-lg-4">
                <div class="product-card" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 50, 300) }}">
                  <div class="product-img-wrap">
                    @if($product->badge)
                      <span class="product-badge">{{ $product->badge }}</span>
                    @endif
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy">
                  </div>
                  <div class="product-card-body">
                    <span class="product-cat-label">{{ $product->cat_label }}</span>
                    <h5>{{ $product->name }}</h5>
                    <p>{{ $product->desc }}</p>
                    <div class="product-card-footer">
                      <div>
                        @if($product->has_discount)
                          <div class="price-tag">₹{{ number_format($product->price) }} <small>Per Unit</small></div>
                          <div class="price-old-row">
                            <span class="price-old">₹{{ number_format($product->old_price) }}</span>
                            <span class="price-discount">{{ $product->discount_percent }}% off</span>
                          </div>
                        @else
                          <div class="price-tag">{{ $product->display_price }}</div>
                        @endif
                      </div>
                      <a href="{{ route('products.show', $product) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <div class="pagination-custom">
            <a href="#"><i class="fa-solid fa-angle-left"></i></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa-solid fa-angle-right"></i></a>
          </div>
        @else
          {{-- EMPTY STATE --}}
          <div style="text-align:center; padding:4rem 1rem; background:#fff; border:1px solid var(--steel-200); border-radius:4px;">
            <i class="fa-solid fa-box-open" style="font-size:2.5rem; color:var(--steel-400); margin-bottom:1rem;"></i>
            <h4 style="color:var(--steel-900); font-size:1.15rem; margin-bottom:0.5rem;">This Range Is Made To Order</h4>
            <p style="color:var(--steel-600); font-size:0.9rem; max-width:420px; margin:0 auto 1.4rem;">We don't have standard listings for this category yet, but we fabricate it on request. Tell us what you need and we'll quote within 24 hours.</p>
            <a href="{{ route('bulk-order') }}" class="btn btn-ember">Request Custom Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container position-relative text-center">
    <h2>Can't Find What You're Looking For?</h2>
    <p>We build fully custom racks to your exact specifications.</p>
    <a href="{{ route('home') }}#contact" class="btn mt-4" style="border:2px solid #fff; color:#fff; font-family:var(--font-display); font-weight:600; letter-spacing:0.06em; text-transform:uppercase; border-radius:2px; background:transparent; padding:0.6rem 1.4rem;">Request Custom Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
  </div>
</section>

@endsection

@push('scripts')
<script>
  // Mobile bottom-sheet open/close only — filtering itself is now
  // handled server-side by ProductController, so no filter JS needed.
  document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('filterSidebar');
    const backdrop = document.getElementById('filterBackdrop');
    const openBtn = document.getElementById('filterOpenBtn');
    const closeBtn = document.getElementById('filterCloseBtn');

    function openFilters() {
      sidebar.classList.add('d-block');
      backdrop.classList.add('show');
      document.body.style.overflow = 'hidden';
    }
    function closeFilters() {
      sidebar.classList.remove('d-block');
      backdrop.classList.remove('show');
      document.body.style.overflow = '';
    }

    if (openBtn) openBtn.addEventListener('click', openFilters);
    if (closeBtn) closeBtn.addEventListener('click', closeFilters);
    if (backdrop) backdrop.addEventListener('click', closeFilters);
  });
</script>
@endpush