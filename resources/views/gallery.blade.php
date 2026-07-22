@extends('layouts.app')

@section('title', 'Our Work | Installed Rack Projects Across India - SM Racks')
@section('meta_description', 'See SM Racks metal racks installed at supermarkets, warehouses & godowns across India. Real projects, real clients — get racks built like these for your business.')
@section('meta_keywords', 'SM Racks projects, installed metal racks India, rack installation gallery')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@@type":"ListItem","position":2,"name":"Our Work","item":"{{ route('gallery') }}"}
  ]
}
</script>
@endpush

@push('styles')
/* =========================================================
   GALLERY PAGE — page-specific CSS only.
========================================================= */
.filter-pills{padding:2.5rem 0 1rem; display:flex; gap:0.7rem; flex-wrap:wrap; justify-content:center;}
.pill{
  font-family:var(--font-display); font-size:0.78rem; letter-spacing:0.06em; text-transform:uppercase;
  padding:0.55rem 1.3rem; border:1px solid var(--steel-200); border-radius:30px; color:var(--steel-700);
  transition:all 0.2s ease; background:#fff; display:inline-block;
}
.pill.active, .pill:hover{background:var(--ember-500); color:#fff; border-color:var(--ember-500);}
.pill:active{transform:scale(0.97);}

.gallery-section{padding:1rem 0 5rem;}
.work-card{
  border-radius:4px;
  overflow:hidden;
  min-height:320px;
  box-shadow:0 6px 20px rgba(32,38,44,0.08);
  transition:transform 0.35s ease, box-shadow 0.35s ease;
  display:flex;
  flex-direction:column;
  background:#fff;
  height:100%;
}
.work-card:hover{transform:translateY(-6px); box-shadow:0 18px 36px rgba(32,38,44,0.16);}
.work-card img{width:100%; height:220px; object-fit:cover; transition:transform 0.5s ease; display:block;}
.work-card:hover img{transform:scale(1.08);}
.work-card-content{position:relative; padding:1.3rem; background:#fff; color:var(--steel-900);}
.work-card-tag{font-family:var(--font-display); font-size:0.68rem; letter-spacing:0.1em; text-transform:uppercase; color:var(--ember-600); margin-bottom:0.45rem; display:block;}
.work-card h5{color:var(--steel-900); font-size:1.05rem; margin-bottom:0.4rem;}
.work-card-loc{color:var(--steel-600); font-size:0.85rem; display:flex; align-items:center; gap:0.4rem;}
.work-card-loc i{color:var(--ember-500);}

.gallery-empty{text-align:center; padding:4rem 1rem; background:#fff; border:1px solid var(--steel-200); border-radius:4px;}
@endpush

@section('content')

<section class="page-header">
  <div class="container">
    <div class="breadcrumb-custom">
      <a href="{{ route('home') }}">Home</a><span class="sep">/</span><span style="color:var(--ember-400);">Our Work</span>
    </div>
    <h1>Racks We&rsquo;ve Installed</h1>
    <p>Real projects across supermarkets, warehouses, and godowns — see the quality before you order.</p>
  </div>
</section>

{{-- FILTER PILLS — real links to ?filter=X, server renders the
     filtered grid directly. Active pill driven by $filter. --}}
<div class="container">
  <div class="filter-pills">
    @foreach($filterLabels as $key => $label)
      <a href="{{ route('gallery', $key === 'all' ? [] : ['filter' => $key]) }}" class="pill {{ $filter === $key ? 'active' : '' }}">{{ $label }}</a>
    @endforeach
  </div>
</div>

<section class="gallery-section">
  <div class="container">
    @if($projects->isNotEmpty())
      <div class="row g-4">
        @foreach($projects as $project)
          <div class="col-md-6 col-lg-4">
            <div class="work-card" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 50, 300) }}">
              <img src="{{ asset('images/' . $project['image']) }}" alt="{{ $project['title'] }} — {{ $project['tag'] }}" loading="lazy">
              <div class="work-card-content">
                <span class="work-card-tag">{{ $project['tag'] }}</span>
                <h5>{{ $project['title'] }}</h5>
                <div class="work-card-loc"><i class="fa-solid fa-location-dot"></i> {{ $project['location'] }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="gallery-empty">
        <i class="fa-solid fa-folder-open" style="font-size:2.5rem; color:var(--steel-400); margin-bottom:1rem;"></i>
        <h4 style="color:var(--steel-900); font-size:1.15rem; margin-bottom:0.5rem;">No Projects In This Category Yet</h4>
        <p style="color:var(--steel-600); font-size:0.9rem;">Check back soon, or browse all projects instead.</p>
      </div>
    @endif
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
    <h2>Want Racks Like These For Your Business?</h2>
    <p>Tell us your requirement and we&rsquo;ll quote within 24 hours.</p>
    <a href="{{ route('bulk-order') }}" class="btn mt-4" style="border:2px solid #fff; color:#fff; font-family:var(--font-display); font-weight:600; letter-spacing:0.06em; text-transform:uppercase; border-radius:2px; background:transparent; padding:0.6rem 1.4rem;">Get a Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
  </div>
</section>

@endsection