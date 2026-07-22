@extends('layouts.app')

{{-- =========================================================
     SEO — unique per page. This is the homepage, so title/desc
     target the primary "metal rack manufacturer Lucknow" intent.
========================================================= --}}
@section('title', 'SM Racks | Metal Rack Manufacturer in Lucknow, Uttar Pradesh')
@section('meta_description', 'SM Racks manufactures supermarket display racks, slotted angle racks, warehouse pallet racks & storage racks in Lucknow. Custom fabrication, bulk pricing, pan-India delivery. Get a free quote in 24 hours.')
@section('meta_keywords', 'metal rack manufacturer Lucknow, supermarket display rack, slotted angle rack, warehouse pallet rack, storage rack manufacturer, SM Racks Lucknow, industrial racks Uttar Pradesh')
@section('og_type', 'website')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebSite",
  "name": "SM Racks",
  "url": "{{ url('/') }}",
  "potentialAction": {
    "@@type": "SearchAction",
    "target": "{{ url('/products') }}?search={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "ItemList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Supermarket Racks","url":"{{ route('products.index', ['cat' => 'supermarket']) }}"},
    {"@@type":"ListItem","position":2,"name":"Slotted Angle Racks","url":"{{ route('products.index', ['cat' => 'slotted-angle']) }}"},
    {"@@type":"ListItem","position":3,"name":"Warehouse Racks","url":"{{ route('products.index', ['cat' => 'warehouse']) }}"},
    {"@@type":"ListItem","position":4,"name":"Storage Racks","url":"{{ route('products.index', ['cat' => 'storage']) }}"},
    {"@@type":"ListItem","position":5,"name":"Heavy Duty Racks","url":"{{ route('products.index', ['cat' => 'heavy-duty']) }}"},
    {"@@type":"ListItem","position":6,"name":"Boltless Racks","url":"{{ route('products.index', ['cat' => 'boltless']) }}"},
    {"@@type":"ListItem","position":7,"name":"Cold Storage Racks","url":"{{ route('products.index', ['cat' => 'cold-storage']) }}"},
    {"@@type":"ListItem","position":8,"name":"Office & Home Racks","url":"{{ route('products.index', ['cat' => 'office']) }}"}
  ]
}
</script>
@endpush

@push('styles')
/* =========================================================
   HOME PAGE — page-specific CSS only.
   Shared tokens/buttons/product-card/cta-banner/reveal already
   live in layouts/app.blade.php — do not redeclare them here.
========================================================= */

/* ---- Hero ---- */
.hero{
  position:relative;
  background-color:var(--off-white);
  display:flex;
  align-items:center;
  justify-content:center;
  overflow:hidden;
  padding:6rem 0 5rem;
}
.hero-grid-lines{
  position:absolute;
  inset:0;
  background-image:
    linear-gradient(0deg, rgba(32,38,44,0.08) 1px, transparent 1px),
    linear-gradient(90deg, rgba(32,38,44,0.08) 1px, transparent 1px);
  background-size:60px 60px;
  opacity:0.12;
  z-index:0;
}
.hero-diagonal{display:none;}
.hero .container{position:relative; z-index:2; text-align:center;}
.hero .row{justify-content:center;}
.hero .col-lg-6.d-none.d-lg-block{display:none !important;}
.hero .col-lg-6{max-width:760px; margin:0 auto;}
.hero-badge{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  gap:0.5rem;
  background:rgba(248,249,250,0.85);
  border:1px solid rgba(32,38,44,0.08);
  color:var(--ember-600);
  font-family:var(--font-display);
  font-size:0.75rem;
  letter-spacing:0.12em;
  text-transform:uppercase;
  padding:0.4rem 1rem;
  border-radius:2px;
  margin:0 auto 1.5rem;
  z-index:2;
}
.hero h1{
  color:var(--steel-900);
  font-size:clamp(2.4rem, 5.5vw, 4.2rem);
  font-weight:800;
  line-height:1.05;
  margin-bottom:1.2rem;
  z-index:2;
  text-align:center;
}
.hero h1 .accent{color:var(--ember-500);}
.hero p.lead{
  color:var(--steel-700);
  font-size:1.15rem;
  max-width:640px;
  margin:0 auto 2rem;
  z-index:2;
  text-align:center;
}
.hero-stats{
  display:flex;
  justify-content:center;
  gap:2.5rem;
  margin-top:3rem;
  flex-wrap:wrap;
  z-index:2;
}
.hero-stat-num{
  font-family:var(--font-display); font-weight:800; font-size:2.2rem; color:var(--steel-900); line-height:1;
}
.hero-stat-num span{color:var(--ember-500);}
.hero-stat-label{
  font-size:0.78rem; text-transform:uppercase; letter-spacing:0.08em; color:var(--steel-600); margin-top:0.3rem;
}
.hero .btn-outline-steel{border-color:var(--steel-900); color:var(--steel-900);}
.hero .btn-outline-steel:hover{background:var(--steel-100); color:var(--steel-900);}

/* ---- Trust bar ---- */
.trust-bar{
  background:#fff;
  padding:1.2rem 0;
  border-top:1px solid var(--steel-200);
  border-bottom:1px solid var(--steel-200);
}
.trust-item{
  color:var(--steel-600);
  font-family:var(--font-display);
  font-size:0.8rem;
  letter-spacing:0.1em;
  text-transform:uppercase;
  text-align:center;
}
.trust-item i{color:var(--ember-500); margin-right:0.5rem;}

/* ---- Category cards ---- */
.cat-section{padding:4.5rem 0; background:var(--off-white);}
.cat-card{
  position:relative;
  background:transparent;
  border-radius:4px;
  overflow:hidden;
  display:flex;
  flex-direction:column;
  text-decoration:none;
  transition:transform 0.35s ease, box-shadow 0.35s ease;
  box-shadow:0 10px 24px rgba(32,38,44,0.1);
}
.cat-card:hover{transform:translateY(-8px); box-shadow:0 18px 36px rgba(32,38,44,0.18);}
.cat-card img{
  width:100%;
  height:200px;
  object-fit:cover;
  transition:transform 0.5s ease;
  display:block;
}
.cat-card:hover img{transform:scale(1.06);}
.cat-card-icon{
  position:absolute;
  top:1rem;
  right:1rem;
  width:46px; height:46px;
  background:var(--ember-500);
  border-radius:6px;
  display:flex; align-items:center; justify-content:center;
  color:#fff; font-size:1.25rem;
  z-index:2;
  transition:transform 0.3s ease;
}
.cat-card:hover .cat-card-icon{transform:translateY(-2px) rotate(-8deg) scale(1.05);}
.cat-card-content{
  position:relative;
  z-index:1;
  background:#fff;
  padding:1.2rem 1.4rem 1.4rem;
  color:var(--steel-900);
  display:flex;
  flex-direction:column;
  gap:0.65rem;
}
.cat-card-headline{display:flex; align-items:flex-start; justify-content:space-between; gap:1rem;}
.cat-card-headline h3{color:var(--steel-900); font-size:1.35rem; margin:0; line-height:1.1; flex:1;}
.cat-card p{color:var(--steel-600); font-size:0.9rem; margin-bottom:0.6rem;}
.cat-card-link{
  color:var(--ember-500);
  font-family:var(--font-display);
  font-size:0.78rem;
  font-weight:600;
  letter-spacing:0.08em;
  text-transform:uppercase;
  display:inline-flex;
  align-items:center;
  gap:0.35rem;
  justify-content:flex-end;
}
.cat-card:hover .cat-card-link i{transform:translateX(5px);}
.cat-card-link i{transition:transform 0.25s ease;}

/* ---- Offers ---- */
.offers-section{padding:3.5rem 0;}
.offer-card{
  position:relative;
  border-radius:6px;
  overflow:hidden;
  text-decoration:none;
  box-shadow:0 8px 22px rgba(32,38,44,0.1);
  transition:transform 0.3s ease;
  display:flex;
  flex-direction:column;
  background:#fff;
}
.offer-card:hover{transform:translateY(-4px);}
.offer-card img{width:100%; height:180px; object-fit:cover; display:block; transition:transform 0.3s ease;}
.offer-card:hover img{transform:scale(1.03);}
.offer-content{padding:1.4rem 1.5rem 1.6rem; color:var(--steel-900); display:flex; flex-direction:column; gap:1.1rem;}
.offer-headline{display:flex; align-items:flex-start; justify-content:space-between; gap:1rem;}
.offer-headline h3{font-size:1.4rem; line-height:1.15; color:var(--steel-900); margin:0; flex:1;}
.offer-content p{font-size:0.9rem; color:var(--steel-600); margin:0;}
.offer-tag{
  position:absolute; top:0.95rem; left:0.95rem;
  background:rgba(255,255,255,0.95);
  padding:0.38rem 0.9rem; border-radius:999px;
  font-family:var(--font-display); font-size:0.65rem; letter-spacing:0.11em; text-transform:uppercase;
  color:var(--ember-500);
  box-shadow:0 8px 20px rgba(32,38,44,0.06);
}
.offer-cta{
  font-family:var(--font-display); font-size:0.78rem; font-weight:600; letter-spacing:0.06em; text-transform:uppercase;
  display:inline-flex; align-items:center; gap:0.4rem; color:var(--ember-500); white-space:nowrap;
}
.offer-card:hover .offer-cta{color:var(--ember-600);}

/* ---- Products section wrapper (cards themselves are shared) ---- */
.products-section{padding:6rem 0; background:var(--off-white);}

/* ---- Shop by feature ---- */
.feature-chip-section{padding:3rem 0; background:#fff; border-top:1px solid var(--steel-200); border-bottom:1px solid var(--steel-200);}
.feature-chip-row{display:flex; gap:1rem; overflow-x:auto; -webkit-overflow-scrolling:touch; padding-bottom:0.3rem; scrollbar-width:none; -ms-overflow-style:none;}
.feature-chip-row::-webkit-scrollbar{display:none;}
.feature-chip{
  flex:0 0 auto; width:150px; text-align:center; text-decoration:none;
  padding:1.4rem 1rem; border:1px solid var(--steel-200); border-radius:6px; transition:all 0.25s ease;
}
.feature-chip:hover{border-color:var(--ember-500); background:rgba(240,83,15,0.04); transform:translateY(-3px);}
.feature-chip:active{transform:scale(0.97);}
.feature-chip-icon{
  width:50px; height:50px; margin:0 auto 0.8rem; border-radius:50%; background:var(--steel-100);
  display:flex; align-items:center; justify-content:center; color:var(--ember-500); font-size:1.3rem;
  transition:background 0.25s ease;
}
.feature-chip:hover .feature-chip-icon{background:var(--ember-500); color:#fff;}
.feature-chip span{font-family:var(--font-display); font-size:0.78rem; letter-spacing:0.03em; text-transform:uppercase; color:var(--steel-800); display:block;}

/* ---- Trending scroller ---- */
.trending-section{padding:4rem 0;}
.trending-scroll{display:flex; gap:1.1rem; overflow-x:auto; -webkit-overflow-scrolling:touch; padding-bottom:0.8rem; scroll-snap-type:x mandatory; scrollbar-width:none; -ms-overflow-style:none;}
.trending-scroll::-webkit-scrollbar{display:none;}
.trending-card{flex:0 0 220px; scroll-snap-align:start;}

/* ---- Features / benefits grid ---- */
.features-grid-section{padding:4rem 0; background:var(--steel-100);}
.feature-item{background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:1.6rem; height:100%; text-align:center; transition:box-shadow 0.3s ease, transform 0.3s ease;}
.feature-item:hover{box-shadow:0 12px 24px rgba(32,38,44,0.08); transform:translateY(-4px);}
.feature-item-icon{width:52px; height:52px; margin:0 auto 1rem; border-radius:50%; background:rgba(240,83,15,0.08); display:flex; align-items:center; justify-content:center; color:var(--ember-500); font-size:1.3rem;}
.feature-item h6{font-family:var(--font-display); font-size:0.88rem; color:var(--steel-900); margin-bottom:0.4rem; text-transform:uppercase; letter-spacing:0.02em;}
.feature-item p{font-size:0.82rem; color:var(--steel-600); margin:0;}

/* ---- Mobile ---- */
@media(max-width:991px){
  .hero{padding:7rem 0 4rem;}
  .hero-stats{gap:1.6rem;}
}
@media(max-width:767px){
  .cat-card{height:auto;}
  .offer-card{height:auto; padding:0;}
  .offer-card img{height:160px;}
  .offer-content{max-width:100%; padding:1.2rem 1rem 1.3rem;}
  .offer-content h3{font-size:1.15rem;}
}
@media(max-width:575px){
  .products-section .row.g-4{--bs-gutter-x:0.6rem; --bs-gutter-y:0.6rem;}
  .products-section .product-card:hover{transform:none;}
  .products-section .product-img-wrap{height:130px; border-bottom-width:2px;}
  .products-section .product-card-body{padding:0.6rem 0.7rem;}
  .products-section .product-card h5{font-size:0.8rem; margin-bottom:0.3rem; line-height:1.25; min-height:2rem; overflow:hidden;}
  .products-section .product-card p{display:none;}
  .products-section .product-card-footer{border-top:none; padding-top:0.3rem; flex-direction:column; align-items:flex-start; gap:0.3rem;}
  .products-section .btn-view-details{font-size:0.68rem;}
  .products-section .product-badge{font-size:0.58rem; padding:0.2rem 0.5rem; top:0.5rem; left:0.5rem;}
}
@endpush

@section('content')
<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-grid-lines"></div>
  <div class="hero-diagonal"><img src="{{ asset('images/hero.png') }}" alt="Industrial warehouse metal racking"></div>
  <div class="container position-relative">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <span class="hero-badge"><i class="fa-solid fa-industry"></i> Lucknow, Uttar Pradesh — Est. Manufacturer</span>
        <h1>Built To Hold. <br>Built To <span class="accent">Last.</span></h1>
        <p class="lead">India's trusted name in industrial, warehouse and supermarket metal racking — custom-fabricated, heavy-duty, and delivered pan-India. From single stores to full-scale warehouses.</p>
        <div class="d-flex gap-3 flex-wrap justify-content-center">
          <a href="#categories" class="btn btn-ember">Explore Racks <i class="fa-solid fa-arrow-right ms-1"></i></a>
          <a href="#contact" class="btn btn-outline-steel">Request Free Quote</a>
        </div>
        <div class="hero-stats">
          <div>
            <div class="hero-stat-num"><span>12+</span></div>
            <div class="hero-stat-label">Years Experience</div>
          </div>
          <div>
            <div class="hero-stat-num"><span>8,500+</span></div>
            <div class="hero-stat-label">Racks Delivered</div>
          </div>
          <div>
            <div class="hero-stat-num"><span>200+</span></div>
            <div class="hero-stat-label">Cities Served</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-none d-lg-block"></div>
    </div>
  </div>
</section>

<!-- TRUST BAR -->
<div class="trust-bar">
  <div class="container">
    <div class="row g-3">
      <div class="col-6 col-md-3 trust-item"><i class="fa-solid fa-shield-halved"></i>ISO Certified Steel</div>
      <div class="col-6 col-md-3 trust-item"><i class="fa-solid fa-truck-fast"></i>Pan-India Delivery</div>
      <div class="col-6 col-md-3 trust-item"><i class="fa-solid fa-gears"></i>Custom Fabrication</div>
      <div class="col-6 col-md-3 trust-item"><i class="fa-solid fa-tags"></i>Bulk Order Pricing</div>
    </div>
  </div>
</div>

<!-- OFFERS -->
<section class="offers-section">
  <div class="container">
    <div class="row g-3">
      <div class="col-md-4">
        <a href="{{ route('products.index', ['cat' => 'storage']) }}" class="offer-card offer-1">
          <img src="{{ asset('images/supermarket.png') }}" alt="Storage rack offer">
          <div class="offer-content">
            <span class="offer-tag">Limited Time</span>
            <div class="offer-headline">
              <h3>Flat 15% Off<br>Storage Racks</h3>
              <span class="offer-cta">Shop Now <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>On all godown & cold storage racking</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ route('bulk-order') }}" class="offer-card offer-2">
          <img src="{{ asset('images/warehouse.png') }}" alt="Bulk order offer">
          <div class="offer-content">
            <span class="offer-tag">Bulk Buy Bonanza</span>
            <div class="offer-headline">
              <h3>Up To 22% Off<br>On Volume Orders</h3>
              <span class="offer-cta">See Pricing <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Free delivery on orders above 50 units</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ route('products.index', ['cat' => 'supermarket']) }}" class="offer-card offer-3">
          <img src="https://images.unsplash.com/photo-1749244768351-2726dc23d26c?auto=format&fit=crop&w=500&q=80&sat=-20" alt="New arrivals offer">
          <div class="offer-content">
            <span class="offer-tag">New Arrivals</span>
            <div class="offer-headline">
              <h3>Latest Display<br>Rack Designs</h3>
              <span class="offer-cta">Explore <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Fresh finishes & modular layouts</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="cat-section" id="categories">
  <div class="container">
    <div class="text-center mx-auto mb-5" data-aos="fade-up" style="max-width:650px;">
      <span class="section-tag">Our Range</span>
      <h2 class="section-title">Racks For Every Industry</h2>
      <p class="section-sub mx-auto">From retail shelving to heavy industrial storage — every rack is engineered for load, durability, and space efficiency.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'supermarket']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="0">
          <img src="{{ asset('images/supermarket.png') }}" alt="Supermarket display racks">
          <div class="cat-card-icon"><i class="fa-solid fa-store"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Supermarket Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Display shelving for retail stores, grocery outlets & showrooms.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'slotted-angle']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="60">
          <img src="{{ asset('images/slotted.png') }}" alt="Slotted angle storage racks">
          <div class="cat-card-icon"><i class="fa-solid fa-layer-group"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Slotted Angle Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Adjustable, bolt-free racks for offices, homes & light storage.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'warehouse']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="120">
          <img src="{{ asset('images/warehouse.png') }}" alt="Warehouse pallet racks">
          <div class="cat-card-icon"><i class="fa-solid fa-warehouse"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Warehouse Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Heavy-duty pallet & industrial racking for bulk storage facilities.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'storage']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="180">
          <img src="{{ asset('images/Storage.png') }}" alt="Godown storage racks">
          <div class="cat-card-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Storage Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Multi-purpose racks for godowns, factories & cold storage units.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'heavy-duty']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="240">
          <img src="{{ asset('images/heavy-duty.png') }}" alt="Heavy duty industrial racks">
          <div class="cat-card-icon"><i class="fa-solid fa-weight-hanging"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Heavy Duty Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>High load-bearing racks for machinery & bulk material storage.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'boltless']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="300">
          <img src="{{ asset('images/boltless.png') }}" alt="Boltless modular racks">
          <div class="cat-card-icon"><i class="fa-solid fa-cubes"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Boltless Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Tool-free assembly, modular racks for quick setup & relocation.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'cold-storage']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="300">
          <img src="{{ asset('images/cold-storage.png') }}" alt="Cold storage racks">
          <div class="cat-card-icon"><i class="fa-solid fa-snowflake"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Cold Storage Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Rust-proof coated racks built for cold rooms & food storage.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'office']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="300">
          <img src="{{ asset('images/office.png') }}" alt="Office and home storage racks">
          <div class="cat-card-icon"><i class="fa-solid fa-building"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Office & Home Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Compact storage solutions for offices, records rooms & homes.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'display-racks']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="0">
          <img src="{{ asset('images/products.png') }}" alt="Display racks">
          <div class="cat-card-icon"><i class="fa-solid fa-table-cells"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Display Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Panel-mounted display racks, 5–8 ft heights, priced per running foot.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'channel-rack']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="60">
          <img src="{{ asset('images/adjustable.png') }}" alt="Channel racks">
          <div class="cat-card-icon"><i class="fa-solid fa-grip-lines"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Channel Rack</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Channel-frame racking, 5–8 ft heights, priced per running foot.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="{{ route('products.index', ['cat' => 'both-side-racks']) }}" class="cat-card" data-aos="fade-up" data-aos-delay="120">
          <img src="{{ asset('images/warehouse.png') }}" alt="Both side racks">
          <div class="cat-card-icon"><i class="fa-solid fa-arrows-left-right"></i></div>
          <div class="cat-card-content">
            <div class="cat-card-headline">
              <h3>Both Side Racks</h3>
              <span class="cat-card-link">View Range <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <p>Double-sided racks, accessible from both faces — built for aisle setups.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- SHOP BY FEATURE -->
<section class="feature-chip-section">
  <div class="container">
    <div class="mb-4">
      <span class="section-tag">Shop by Feature</span>
      <h2 class="section-title mb-0" style="font-size:1.6rem;">Find Racks By What You Need</h2>
    </div>
    <div class="feature-chip-row">
      <a href="{{ route('products.index', ['feature' => 'adjustable']) }}" class="feature-chip"><div class="feature-chip-icon"><i class="fa-solid fa-arrows-up-down"></i></div><span>Adjustable Shelves</span></a>
      <a href="{{ route('products.index', ['feature' => 'heavy-load']) }}" class="feature-chip"><div class="feature-chip-icon"><i class="fa-solid fa-weight-hanging"></i></div><span>Heavy Load Capacity</span></a>
      <a href="{{ route('products.index', ['feature' => 'custom-size']) }}" class="feature-chip"><div class="feature-chip-icon"><i class="fa-solid fa-ruler-combined"></i></div><span>Custom Sizes</span></a>
      <a href="{{ route('products.index', ['feature' => 'rust-proof']) }}" class="feature-chip"><div class="feature-chip-icon"><i class="fa-solid fa-shield-halved"></i></div><span>Rust-Proof Coating</span></a>
      <a href="{{ route('products.index', ['feature' => 'boltless']) }}" class="feature-chip"><div class="feature-chip-icon"><i class="fa-solid fa-cubes"></i></div><span>Boltless Design</span></a>
      <a href="{{ route('products.index', ['feature' => 'modular']) }}" class="feature-chip"><div class="feature-chip-icon"><i class="fa-solid fa-layer-group"></i></div><span>Modular Add-On</span></a>
    </div>
  </div>
</section>

<!-- WHY US -->
<!-- FEATURED PRODUCTS -->
<section class="products-section" id="products">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-end mb-5" data-aos="fade-up">
      <div>
        <span class="section-tag">Best Sellers</span>
        <h2 class="section-title mb-0">Featured Products</h2>
      </div>
      <a href="{{ route('products.index') }}" class="btn btn-outline-steel mt-3 mt-md-0" style="border-color:var(--steel-800); color:var(--steel-800);">View All Products</a>
    </div>
    <div class="row g-4">
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="0">
          <div class="product-img-wrap"><span class="product-badge">Best Seller</span><img src="{{ asset('images/products.png') }}" alt="Heavy duty display rack"></div>
          <div class="product-card-body">
            <h5>Heavy Duty Display Rack</h5>
            <p>5-tier supermarket shelving, 900mm width, adjustable shelves.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹4,200</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹4,960</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'heavy-duty-display-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="60">
          <div class="product-img-wrap"><img src="{{ asset('images/products2.png') }}" alt="Slotted angle rack MS"></div>
          <div class="product-card-body">
            <h5>Slotted Angle Rack MS</h5>
            <p>6-shelf bolt-free rack, 200kg/shelf load capacity.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹2,850</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹3,360</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'slotted-angle-rack-ms']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="120">
          <div class="product-img-wrap"><span class="product-badge">New</span><img src="{{ asset('images/products3.png') }}" alt="Industrial pallet rack"></div>
          <div class="product-card-body">
            <h5>Industrial Pallet Rack</h5>
            <p>Heavy-duty warehouse racking, 2000kg/level capacity.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹9,500</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹11,210</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'industrial-pallet-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="180">
          <div class="product-img-wrap"><img src="{{ asset('images/products4.png') }}" alt="Godown storage rack"></div>
          <div class="product-card-body">
            <h5>Godown Storage Rack</h5>
            <p>4-tier multi-purpose rack for bulk goods storage.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹5,100</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹6,020</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'godown-storage-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="240">
          <div class="product-img-wrap"><img src="{{ asset('images/compact.png') }}" alt="Compact display rack"></div>
          <div class="product-card-body">
            <h5>Compact Display Rack</h5>
            <p>4-tier shelving, 600mm width, ideal for small stores.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹3,400</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹4,010</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'compact-display-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="300">
          <div class="product-img-wrap"><img src="{{ asset('images/adjustable.png') }}" alt="Adjustable storage rack"></div>
          <div class="product-card-body">
            <h5>Adjustable Storage Rack</h5>
            <p>8-shelf tall unit, ideal for offices & godowns.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹3,950</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹4,660</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'adjustable-storage-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="300">
          <div class="product-img-wrap"><img src="{{ asset('images/selective.png') }}" alt="Selective pallet rack"></div>
          <div class="product-card-body">
            <h5>Selective Pallet Rack</h5>
            <p>3-level heavy racking with forklift access aisles.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹11,200</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹13,220</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'selective-pallet-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="product-card" data-aos="fade-up" data-aos-delay="300">
          <div class="product-img-wrap"><span class="product-badge">Popular</span><img src="{{ asset('images/wallmounted.png') }}" alt="Wall mounted display rack"></div>
          <div class="product-card-body">
            <h5>Wall Mounted Display Rack</h5>
            <p>Space-saving wall unit, 3-tier, powder coated finish.</p>
            <div class="product-card-footer">
              <div><span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹2,600</span><div style="display:flex; align-items:center; gap:0.35rem; margin-top:0.1rem;"><span style="font-size:0.72rem; color:var(--steel-400); text-decoration:line-through;">₹3,070</span><span style="font-size:0.7rem; color:var(--ember-600); font-weight:600;">15% off</span></div></div>
              <a href="{{ route('products.show', ['product' => 'wall-mounted-display-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TRENDING NOW -->
<section class="trending-section" style="background:var(--steel-100);">
  <div class="container">
    <div class="mb-4">
      <span class="section-tag">Trending Now</span>
      <h2 class="section-title mb-0" style="font-size:1.6rem;">Popular This Month</h2>
    </div>
    <div class="trending-scroll">
      <div class="trending-card">
        <div class="product-card">
          <div class="product-img-wrap"><span class="product-badge">Hot</span><img src="{{ asset('images/Popular1.png') }}" alt="4-Tier Boltless Rack"></div>
          <div class="product-card-body">
            <h5>4-Tier Boltless Rack</h5>
            <div class="product-card-footer">
              <span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹3,100</span>
              <a href="{{ route('products.index', ['cat' => 'boltless']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="trending-card">
        <div class="product-card">
          <div class="product-img-wrap"><img src="{{ asset('images/Popular2.png') }}" alt="Heavy Duty Pallet Rack"></div>
          <div class="product-card-body">
            <h5>Heavy Duty Pallet Rack</h5>
            <div class="product-card-footer">
              <span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹12,400</span>
              <a href="{{ route('products.index', ['cat' => 'warehouse']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="trending-card">
        <div class="product-card">
          <div class="product-img-wrap"><span class="product-badge">New</span><img src="{{ asset('images/Popular3.png') }}" alt="Cold Storage Rack"></div>
          <div class="product-card-body">
            <h5>Cold Storage Rack</h5>
            <div class="product-card-footer">
              <span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹6,700</span>
              <a href="{{ route('products.show', ['product' => 'cold-storage-rack']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="trending-card">
        <div class="product-card">
          <div class="product-img-wrap"><img src="{{ asset('images/Popular4.png') }}" alt="Office Storage Rack"></div>
          <div class="product-card-body">
            <h5>Office Storage Rack</h5>
            <div class="product-card-footer">
              <span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹2,950</span>
              <a href="{{ route('products.index', ['cat' => 'office']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="trending-card">
        <div class="product-card">
          <div class="product-img-wrap"><img src="{{ asset('images/Popular5.png') }}" alt="Modular Storage Rack"></div>
          <div class="product-card-body">
            <h5>Modular Storage Rack</h5>
            <div class="product-card-footer">
              <span style="font-family:var(--font-display); font-weight:700; color:var(--steel-900);">₹4,600</span>
              <a href="{{ route('products.index', ['cat' => 'storage']) }}" class="btn-view-details">Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="features-grid-section">
  <div class="container">
    <div class="mb-4">
      <span class="section-tag">Features</span>
      <h2 class="section-title mb-0" style="font-size:1.6rem;">What You Get With Every Order</h2>
    </div>
    <div class="row g-3">
      <div class="col-6 col-lg-2">
        <div class="feature-item">
          <div class="feature-item-icon"><i class="fa-solid fa-ruler-combined"></i></div>
          <h6>Custom Sizing</h6>
          <p>Built to your exact space</p>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <div class="feature-item">
          <div class="feature-item-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <h6>Rust-Proof Finish</h6>
          <p>Powder coated, long-lasting</p>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <div class="feature-item">
          <div class="feature-item-icon"><i class="fa-solid fa-truck-fast"></i></div>
          <h6>Pan-India Delivery</h6>
          <p>Dispatched from Lucknow</p>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <div class="feature-item">
          <div class="feature-item-icon"><i class="fa-solid fa-certificate"></i></div>
          <h6>2 Year Warranty</h6>
          <p>Structural coverage included</p>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <div class="feature-item">
          <div class="feature-item-icon"><i class="fa-solid fa-file-invoice"></i></div>
          <h6>GST Invoicing</h6>
          <p>Proper billing, every order</p>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <div class="feature-item">
          <div class="feature-item-icon"><i class="fa-solid fa-bolt"></i></div>
          <h6>24hr Quote</h6>
          <p>Fast response, no delays</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BULK PRICING TEASER STRIP -->
<section style="background:var(--steel-900); padding:1.8rem 0;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
      <div class="d-flex align-items-center gap-3">
        <i class="fa-solid fa-tags" style="color:var(--ember-500); font-size:1.6rem;"></i>
        <div>
          <div style="font-family:var(--font-display); color:#fff; font-size:1.05rem; text-transform:uppercase; letter-spacing:0.02em;">Ordering In Bulk?</div>
          <div style="color:var(--steel-400); font-size:0.85rem;">Save up to 22% on volume orders — pricing tiers for every business size.</div>
        </div>
      </div>
      <a href="{{ route('bulk-order') }}" class="btn btn-ember">See Bulk Pricing <i class="fa-solid fa-arrow-right ms-1"></i></a>
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<section class="cta-banner">
  <div class="container position-relative text-center">
    <h2>Need Racks Custom-Built For Your Space?</h2>
    <p>Get a free consultation and quote within 24 hours.</p>
    <a href="#contact" class="btn btn-outline-steel mt-4" style="border-color:#fff; color:#fff;">Request Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
  </div>
</section>

@endsection