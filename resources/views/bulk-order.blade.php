@extends('layouts.app')

@section('title', 'Bulk Order Metal Racks | Wholesale Pricing - SM Racks')
@section('meta_description', 'Order metal racks in bulk at wholesale prices from SM Racks. Supermarket, warehouse, slotted angle & storage racks. Volume discounts up to 22%, custom fabrication, pan-India delivery. Get a quote in 24 hours.')
@section('meta_keywords', 'bulk metal racks, wholesale rack pricing, rack manufacturer bulk order, SM Racks bulk pricing')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@@type":"ListItem","position":2,"name":"Bulk Orders","item":"{{ route('bulk-order') }}"}
  ]
}
</script>
@endpush

@push('styles')
/* =========================================================
   BULK ORDER PAGE — page-specific CSS only.
========================================================= */
.bulk-hero{position:relative; background:var(--steel-900); padding:8.5rem 0 4rem; overflow:hidden;}
.bulk-hero::before{content:''; position:absolute; inset:0; background-image:linear-gradient(var(--steel-700) 1px, transparent 1px), linear-gradient(90deg, var(--steel-700) 1px, transparent 1px); background-size:50px 50px; opacity:0.25;}
.bulk-hero-img{position:absolute; right:0; top:0; bottom:0; width:42%; clip-path:polygon(20% 0, 100% 0, 100% 100%, 0 100%);}
.bulk-hero-img img{width:100%; height:100%; object-fit:cover; opacity:0.55;}
.bulk-hero-img::after{content:''; position:absolute; inset:0; background:linear-gradient(90deg, var(--steel-900) 0%, transparent 40%);}
.bulk-hero .container{position:relative;}
.bulk-badge{display:inline-flex; align-items:center; gap:0.5rem; background:rgba(240,83,15,0.15); border:1px solid var(--ember-500); color:var(--ember-400); font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.1em; text-transform:uppercase; padding:0.4rem 1rem; border-radius:2px; margin-bottom:1.2rem;}
.bulk-hero h1{color:#fff; font-size:clamp(2rem,4.2vw,3.2rem); font-weight:800; line-height:1.1; margin-bottom:1rem; max-width:640px;}
.bulk-hero h1 .accent{color:var(--ember-500);}
.bulk-hero p{color:var(--steel-400); font-size:1.05rem; max-width:560px; margin-bottom:1.8rem;}
.hero-mini-stats{display:flex; gap:2rem; flex-wrap:wrap;}
.hero-mini-stat{display:flex; align-items:center; gap:0.6rem; color:var(--steel-200); font-size:0.85rem;}
.hero-mini-stat i{color:var(--ember-500); font-size:1.1rem;}
@media(max-width:991px){.bulk-hero-img{display:none;}}

.tiers-section{padding:4.5rem 0 2rem;}
.tier-card{
  background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:2rem 1.6rem; text-align:center; height:100%;
  transition:transform 0.3s ease, box-shadow 0.3s ease; position:relative;
}
.tier-card:hover{transform:translateY(-6px); box-shadow:0 16px 32px rgba(32,38,44,0.1);}
.tier-card.featured{border:2px solid var(--ember-500);}
.tier-card.featured::before{
  content:'MOST POPULAR'; position:absolute; top:-13px; left:50%; transform:translateX(-50%);
  background:var(--ember-500); color:#fff; font-family:var(--font-display); font-size:0.65rem; letter-spacing:0.08em;
  padding:0.3rem 0.9rem; border-radius:20px;
}
.tier-qty{font-family:var(--font-display); font-size:0.78rem; letter-spacing:0.08em; text-transform:uppercase; color:var(--steel-600); margin-bottom:0.6rem;}
.tier-discount{font-family:var(--font-display); font-weight:800; font-size:2.6rem; color:var(--ember-600); line-height:1;}
.tier-discount small{font-size:1rem; font-weight:600;}
.tier-label{color:var(--steel-600); font-size:0.88rem; margin-top:0.5rem;}

.why-bulk-section{padding:4rem 0; background:var(--steel-100);}
.why-bulk-item{display:flex; gap:1rem; align-items:flex-start; margin-bottom:1.6rem;}
.why-bulk-icon{
  width:48px; height:48px; flex-shrink:0; background:#fff; border:1px solid var(--ember-500); border-radius:2px;
  display:flex; align-items:center; justify-content:center; color:var(--ember-500); font-size:1.2rem;
}
.why-bulk-item h6{font-family:var(--font-display); color:var(--steel-900); font-size:0.95rem; margin-bottom:0.3rem;}
.why-bulk-item p{color:var(--steel-600); font-size:0.87rem; margin:0;}

.form-section{padding:4.5rem 0;}
.bulk-form-card{background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:2.2rem; box-shadow:0 10px 30px rgba(32,38,44,0.06);}
.bulk-form-card h3{color:var(--steel-900); font-size:1.4rem; margin-bottom:0.4rem;}
.bulk-form-card > p{color:var(--steel-600); font-size:0.9rem; margin-bottom:1.6rem;}
.form-label-custom{font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; color:var(--steel-700); margin-bottom:0.4rem; display:block;}
.form-control-custom{border:1px solid var(--steel-200); border-radius:2px; padding:0.65rem 0.9rem; font-size:0.9rem; width:100%; margin-bottom:1.1rem;}
.form-control-custom:focus{outline:none; border-color:var(--ember-500);}
.rack-type-grid{display:grid; grid-template-columns:1fr 1fr; gap:0.7rem; margin-bottom:1.1rem;}
.rack-type-opt{
  border:1px solid var(--steel-200); border-radius:2px; padding:0.7rem; font-size:0.85rem; cursor:pointer;
  text-align:center; transition:all 0.2s ease; color:var(--steel-700);
}
.rack-type-opt input{display:none;}
.rack-type-opt:has(input:checked){background:rgba(240,83,15,0.08); border-color:var(--ember-500); color:var(--ember-600); font-weight:600;}
.form-trust-strip{display:flex; gap:1.5rem; flex-wrap:wrap; margin-top:1.5rem; padding-top:1.5rem; border-top:1px dashed var(--steel-200);}
.form-trust-strip .item{display:flex; align-items:center; gap:0.5rem; font-size:0.8rem; color:var(--steel-600);}
.form-trust-strip .item i{color:var(--ember-500);}

.side-info-card{background:var(--steel-900); border-radius:4px; padding:2rem; color:#fff; margin-bottom:1.2rem;}
.side-info-card h5{font-family:var(--font-display); font-size:1.05rem; margin-bottom:1rem;}
.side-info-card .contact-line{color:var(--steel-200);}
.side-info-card .contact-line i{color:var(--ember-500);}
.side-process{background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:1.6rem;}
.side-process h5{font-family:var(--font-display); font-size:0.95rem; color:var(--steel-900); margin-bottom:1rem;}
.side-process-step{display:flex; gap:0.8rem; align-items:flex-start; margin-bottom:1rem;}
.side-process-num{width:26px; height:26px; flex-shrink:0; background:var(--ember-500); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:var(--font-display); font-size:0.75rem; font-weight:700;}
.side-process-step p{margin:0; font-size:0.85rem; color:var(--steel-700);}
@endpush

@section('content')

<section class="bulk-hero">
  <div class="bulk-hero-img"><img src="https://images.unsplash.com/photo-1741655262435-4890ab9918fa?auto=format&fit=crop&w=900&q=80" alt="Bulk warehouse rack order"></div>
  <div class="container">
    <div class="breadcrumb-custom">
      <a href="{{ route('home') }}">Home</a><span class="sep">/</span><span style="color:var(--ember-400);">Bulk Orders</span>
    </div>
    <span class="bulk-badge"><i class="fa-solid fa-tags"></i> Wholesale Pricing</span>
    <h1>Buying In Bulk? <span class="accent">Save Up To 22%</span> On Every Rack.</h1>
    <p>Direct factory pricing for supermarkets, warehouses, distributors &amp; institutional buyers. No middlemen, no markup — order 10 units or 1,000.</p>
    <div class="hero-mini-stats">
      <div class="hero-mini-stat"><i class="fa-solid fa-bolt"></i> Quote within 24 hours</div>
      <div class="hero-mini-stat"><i class="fa-solid fa-truck-fast"></i> Pan-India dispatch</div>
      <div class="hero-mini-stat"><i class="fa-solid fa-file-invoice"></i> GST invoicing</div>
    </div>
  </div>
</section>

<section class="tiers-section">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Volume Discounts</span>
      <h2 class="section-title">The More You Order, The More You Save</h2>
    </div>
    <div class="row g-4">
      @foreach($tiers as $tier)
        <div class="col-md-6 col-lg-3">
          <div class="tier-card reveal {{ $tier['featured'] ? 'featured' : '' }}">
            <div class="tier-qty">{{ $tier['qty'] }}</div>
            <div class="tier-discount">{{ $tier['discount'] }}<small>%</small></div>
            <div class="tier-label">{{ $tier['label'] }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="why-bulk-section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6">
        <span class="section-tag">Why Order From Us</span>
        <h2 class="section-title mb-4">Built For Large Orders</h2>
        @foreach($whyBulk as $item)
          <div class="why-bulk-item reveal">
            <div class="why-bulk-icon"><i class="fa-solid {{ $item['icon'] }}"></i></div>
            <div><h6>{{ $item['title'] }}</h6><p>{{ $item['desc'] }}</p></div>
          </div>
        @endforeach
      </div>
      <div class="col-lg-6">
        <img src="https://images.unsplash.com/photo-1749244768351-2726dc23d26c?auto=format&fit=crop&w=800&q=80" alt="Bulk metal rack fabrication" style="width:100%; height:100%; object-fit:cover; border-radius:4px; min-height:400px;">
      </div>
    </div>
  </div>
</section>

<section class="form-section" id="bulk-form">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="bulk-form-card">
          <h3>Get Your Bulk Order Quote</h3>
          <p>Fill in the details below — our team responds with pricing within 24 hours.</p>

          @if(session('quote_success'))
            <div class="alert alert-success" style="border-radius:4px; font-size:0.88rem;">{{ session('quote_success') }}</div>
          @endif
          @if($errors->any())
            <div class="alert alert-danger" style="border-radius:4px; font-size:0.88rem;">
              <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('quote.submit') }}">
            @csrf
            <label class="form-label-custom">Rack Type Needed</label>
            <div class="rack-type-grid">
              @foreach($rackTypes as $index => $type)
                <label class="rack-type-opt">
                  <input type="radio" name="rack_type" value="{{ $type }}" {{ old('rack_type', $rackTypes[0]) === $type ? 'checked' : '' }}> {{ $type }}
                </label>
              @endforeach
            </div>

            <div class="row">
              <div class="col-md-6">
                <label class="form-label-custom">Full Name*</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control-custom" placeholder="Your name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-custom">Company Name</label>
                <input type="text" name="company" value="{{ old('company') }}" class="form-control-custom" placeholder="Business name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="form-label-custom">Phone Number*</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control-custom" placeholder="+91" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-custom">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control-custom" placeholder="you@company.com">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="form-label-custom">Quantity Required*</label>
                <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control-custom" placeholder="e.g. 50" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-custom">Delivery City*</label>
                <input type="text" name="delivery_city" value="{{ old('delivery_city') }}" class="form-control-custom" placeholder="e.g. Lucknow" required>
              </div>
            </div>
            <label class="form-label-custom">Additional Requirements</label>
            <textarea name="message" class="form-control-custom" rows="4" placeholder="Custom size, color, delivery timeline, installation needs...">{{ old('message') }}</textarea>

            <button type="submit" class="btn btn-ember w-100 mt-2">Get My Bulk Quote <i class="fa-solid fa-arrow-right ms-1"></i></button>

            <div class="form-trust-strip">
              <div class="item"><i class="fa-solid fa-lock"></i> Your info stays private</div>
              <div class="item"><i class="fa-solid fa-clock"></i> Response in 24 hrs</div>
              <div class="item"><i class="fa-solid fa-ban"></i> No spam calls</div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="side-info-card">
          <h5>Talk to Our Bulk Order Team</h5>
          <div class="contact-line"><i class="fa-solid fa-phone"></i><span>+91 63943 09204, +91 95698 11406</span></div>
          <div class="contact-line"><i class="fa-solid fa-envelope"></i><span>gauravmishra3851@gmail.com</span></div>
          <div class="contact-line"><i class="fa-solid fa-location-dot"></i><span>Jankipuram, Lucknow, UP</span></div>
          <a href="https://wa.me/916394309204" target="_blank" rel="noopener noreferrer" class="btn btn-ember w-100 mt-2"><i class="fa-brands fa-whatsapp me-1"></i> Chat on WhatsApp</a>
        </div>
        <div class="side-process">
          <h5>What Happens Next</h5>
          @foreach($sideProcessSteps as $index => $step)
            <div class="side-process-step">
              <div class="side-process-num">{{ $index + 1 }}</div>
              <p>{{ $step }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection