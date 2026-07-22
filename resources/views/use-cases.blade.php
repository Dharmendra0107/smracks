@extends('layouts.app')

@section('title', 'Where To Use Our Racks | Applications & Scenarios - SM Racks')
@section('meta_description', 'See how SM Racks racking fits real spaces — supermarkets, warehouses, cold storage, offices, pharmacies & homes. Find the right rack for your scenario.')
@section('meta_keywords', 'rack applications, where to use metal racks, SM Racks use cases')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@@type":"ListItem","position":2,"name":"Where To Use","item":"{{ route('use-cases') }}"}
  ]
}
</script>
@endpush

@push('styles')
/* =========================================================
   USE CASES PAGE — page-specific CSS only.
========================================================= */
.scenario-section{padding:1rem 0 5rem;}
.scenario-card{
  position:relative;
  background:transparent;
  border-radius:4px;
  overflow:hidden;
  display:flex;
  flex-direction:column;
  height:100%;
  transition:transform 0.35s ease, box-shadow 0.35s ease;
  box-shadow:0 10px 24px rgba(32,38,44,0.1);
}
.scenario-card:hover{transform:translateY(-8px); box-shadow:0 18px 36px rgba(32,38,44,0.18);}
.scenario-card img{width:100%; height:210px; object-fit:cover; transition:transform 0.5s ease; display:block;}
.scenario-card:hover img{transform:scale(1.06);}
.scenario-card-icon{
  position:absolute; top:1rem; right:1rem;
  width:46px; height:46px;
  background:var(--ember-500);
  border-radius:6px;
  display:flex; align-items:center; justify-content:center;
  color:#fff; font-size:1.25rem;
  z-index:2;
  transition:transform 0.3s ease;
}
.scenario-card:hover .scenario-card-icon{transform:translateY(-2px) rotate(-8deg) scale(1.05);}
.scenario-card-content{
  position:relative; background:#fff; padding:1.2rem 1.4rem 1.4rem; color:var(--steel-900);
  display:flex; flex-direction:column; gap:0.55rem; flex:1;
}
.scenario-card-tag{font-family:var(--font-display); color:var(--ember-600); font-size:0.7rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase;}
.scenario-card h3{color:var(--steel-900); font-size:1.3rem; margin:0.1rem 0 0.2rem; line-height:1.1;}
.scenario-card p{color:var(--steel-600); font-size:0.88rem; margin-bottom:0.3rem; flex:1;}
.scenario-recommend{
  font-family:var(--font-display); font-size:0.72rem; letter-spacing:0.04em; text-transform:uppercase; color:var(--steel-500);
  padding-top:0.6rem; border-top:1px dashed var(--steel-200); margin-bottom:0.2rem;
}
.scenario-recommend strong{color:var(--steel-900);}
.scenario-link{
  color:var(--ember-600); font-family:var(--font-display); font-size:0.78rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase;
  display:inline-flex; align-items:center; gap:0.35rem;
}
.scenario-card:hover .scenario-link i{transform:translateX(5px);}
.scenario-link i{transition:transform 0.25s ease;}

@media(max-width:767px){
  .scenario-card img{height:180px;}
}
@endpush

@section('content')

<section class="page-header">
  <div class="container">
    <div class="breadcrumb-custom">
      <a href="{{ route('home') }}">Home</a><span class="sep">/</span><span style="color:var(--ember-400);">Where To Use</span>
    </div>
    <h1>Where To Use Our Racks</h1>
    <p>Same rack, different job. See how our racking fits real spaces — pick your scenario, find the right fit.</p>
  </div>
</section>

<section class="scenario-section">
  <div class="container">
    <div class="row g-4">
      @foreach($scenarios as $scenario)
        <div class="col-md-6 col-lg-4">
          <a href="{{ route('products.index', ['cat' => $scenario['cat']]) }}" class="scenario-card" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 50, 300) }}">
            <img src="{{ asset('images/' . $scenario['image']) }}" alt="{{ $scenario['title'] }}" loading="lazy">
            <div class="scenario-card-icon"><i class="fa-solid {{ $scenario['icon'] }}"></i></div>
            <div class="scenario-card-content">
              <span class="scenario-card-tag">{{ $scenario['tag'] }}</span>
              <h3>{{ $scenario['title'] }}</h3>
              <p>{{ $scenario['desc'] }}</p>
              <div class="scenario-recommend">Recommended: <strong>{{ $scenario['recommend'] }}</strong></div>
              <span class="scenario-link">View Racks <i class="fa-solid fa-arrow-right"></i></span>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="stats-strip">
  <div class="container">
    <div class="row g-4">
      <div class="col-6 col-md-3 stat-block"><div class="stat-num"><span>200+</span></div><div class="stat-label">Projects Completed</div></div>
      <div class="col-6 col-md-3 stat-block"><div class="stat-num"><span>8,500+</span></div><div class="stat-label">Racks Delivered</div></div>
      <div class="col-6 col-md-3 stat-block"><div class="stat-num"><span>200+</span></div><div class="stat-label">Cities Served</div></div>
      <div class="col-6 col-md-3 stat-block"><div class="stat-num"><span>12+</span></div><div class="stat-label">Years Experience</div></div>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container position-relative text-center">
    <h2>Not Sure Which Rack Fits Your Space?</h2>
    <p>Tell us your scenario and we&rsquo;ll recommend the right setup — quote within 24 hours.</p>
    <a href="{{ route('bulk-order') }}" class="btn mt-4" style="border:2px solid #fff; color:#fff; font-family:var(--font-display); font-weight:600; letter-spacing:0.06em; text-transform:uppercase; border-radius:2px; background:transparent; padding:0.6rem 1.4rem;">Get a Recommendation <i class="fa-solid fa-arrow-right ms-1"></i></a>
  </div>
</section>

@endsection