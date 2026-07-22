@extends('layouts.app')

@section('title', 'About Us | SM Racks - Metal Rack Manufacturer, Lucknow')
@section('meta_description', 'Learn about SM Racks — Lucknow-based metal rack manufacturer. Our process, quality standards, and why businesses across India trust us for custom racking.')
@section('meta_keywords', 'about SM Racks, metal rack manufacturer Lucknow, rack fabrication company')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@@type":"ListItem","position":2,"name":"About","item":"{{ route('about') }}"}
  ]
}
</script>
@endpush

@push('styles')
/* =========================================================
   ABOUT PAGE — page-specific CSS only.
========================================================= */
.story-section{padding:4.5rem 0;}
.story-section img{width:100%; height:100%; object-fit:cover; border-radius:4px; min-height:380px;}
.story-section p{color:var(--steel-600); font-size:0.95rem; line-height:1.8;}

.why-section{padding:1rem 0 4rem;}
.feature-box{background:#fff; border:1px solid var(--steel-200); border-left:3px solid var(--ember-500); padding:2rem 1.6rem; height:100%; transition:box-shadow 0.3s ease, transform 0.3s ease; box-shadow:0 4px 16px rgba(32,38,44,0.04);}
.feature-box:hover{box-shadow:0 12px 28px rgba(32,38,44,0.1); transform:translateY(-4px);}
.feature-icon{width:56px; height:56px; background:rgba(240,83,15,0.08); border:1px solid var(--ember-500); border-radius:2px; display:flex; align-items:center; justify-content:center; color:var(--ember-500); font-size:1.4rem; margin-bottom:1.2rem;}
.feature-box h4{color:var(--steel-900); font-size:1.05rem; margin-bottom:0.6rem;}
.feature-box p{color:var(--steel-600); font-size:0.9rem; margin:0;}

.process-section{padding:4rem 0; background:var(--steel-100);}
.process-step{text-align:center; position:relative; padding:0 1rem;}
.process-num{width:70px; height:70px; background:var(--steel-900); color:var(--ember-500); font-family:var(--font-display); font-weight:800; font-size:1.6rem; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 1.2rem; border:3px solid var(--ember-500);}
.process-step h5{font-family:var(--font-display); font-size:1rem; color:var(--steel-900); margin-bottom:0.5rem;}
.process-step p{color:var(--steel-600); font-size:0.87rem;}
.process-connector{position:absolute; top:35px; left:60%; width:80%; height:3px; background:repeating-linear-gradient(90deg, var(--ember-500) 0 8px, transparent 8px 16px);}
@media(max-width:991px){.process-connector{display:none;}}

.testimonial-section{padding:4.5rem 0;}
.testimonial-card{background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:2rem; height:100%; box-shadow:0 4px 16px rgba(32,38,44,0.05);}
.testimonial-stars{color:var(--ember-500); margin-bottom:1rem; font-size:0.9rem;}
.testimonial-text{color:var(--steel-600); font-size:0.95rem; margin-bottom:1.4rem; font-style:italic;}
.testimonial-author{display:flex; align-items:center; gap:0.8rem;}
.testimonial-avatar{width:44px; height:44px; border-radius:50%; background:var(--ember-500); display:flex; align-items:center; justify-content:center; color:#fff; font-family:var(--font-display); font-weight:700;}
.testimonial-name{color:var(--steel-900); font-family:var(--font-display); font-size:0.9rem; font-weight:600;}
.testimonial-role{color:var(--steel-600); font-size:0.78rem;}
@endpush

@section('content')

<section class="page-header">
  <div class="container">
    <div class="breadcrumb-custom">
      <a href="{{ route('home') }}">Home</a><span class="sep">/</span><span style="color:var(--ember-400);">About</span>
    </div>
    <h1>About SM Racks</h1>
    <p>Lucknow-based manufacturer building custom metal racking for stores, warehouses &amp; godowns across India since 2013.</p>
  </div>
</section>

<section class="story-section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        {{-- TODO: swap for a real facility/team photo once available --}}
        <img src="https://images.unsplash.com/photo-1741655262435-4890ab9918fa?auto=format&fit=crop&w=800&q=80" alt="SM Racks fabrication facility">
      </div>
      <div class="col-lg-6">
        <span class="section-tag">Our Story</span>
        <h2 class="section-title">Built On Steel &amp; Straight Dealing</h2>
        <p>What started as a small fabrication unit in Jankipuram has grown into a full-scale racking manufacturer serving supermarkets, warehouses, and godowns across 200+ cities. We still run everything in-house — cutting, welding, coating — so every rack that leaves our facility meets the same standard.</p>
        <p>No agents, no inflated pricing. Just racks built to spec, delivered on time.</p>
      </div>
    </div>
  </div>
</section>

<section class="why-section">
  <div class="container">
    <div class="text-center mx-auto mb-5" style="max-width:650px;">
      <span class="section-tag">Why SM Racks</span>
      <h2 class="section-title">Engineered For Reliability</h2>
      <p style="color:var(--steel-600);">We don&rsquo;t just sell racks — we build storage systems that last decades under real-world load.</p>
    </div>
    <div class="row g-4">
      @foreach($features as $feature)
        <div class="col-md-6 col-lg-3">
          <div class="feature-box" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 60, 300) }}">
            <div class="feature-icon"><i class="fa-solid {{ $feature['icon'] }}"></i></div>
            <h4>{{ $feature['title'] }}</h4>
            <p>{{ $feature['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="process-section">
  <div class="container">
    <div class="text-center mx-auto mb-5" style="max-width:650px;">
      <span class="section-tag">How We Work</span>
      <h2 class="section-title">From Enquiry To Delivery</h2>
    </div>
    <div class="row g-4">
      @foreach($processSteps as $step)
        <div class="col-6 col-lg-3">
          <div class="process-step" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 60, 300) }}">
            @if(!$loop->last)
              <div class="process-connector"></div>
            @endif
            <div class="process-num">{{ $step['num'] }}</div>
            <h5>{{ $step['title'] }}</h5>
            <p>{{ $step['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="testimonial-section">
  <div class="container">
    <div class="text-center mx-auto mb-5" style="max-width:650px;">
      <span class="section-tag">Client Feedback</span>
      <h2 class="section-title">Trusted By Businesses Nationwide</h2>
    </div>
    <div class="row g-4">
      @foreach($testimonials as $testimonial)
        <div class="col-md-4">
          <div class="testimonial-card" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 60, 300) }}">
            <div class="testimonial-stars">
              @for($i = 0; $i < 5; $i++)<i class="fa-solid fa-star"></i>@endfor
            </div>
            <p class="testimonial-text">&ldquo;{{ $testimonial['quote'] }}&rdquo;</p>
            <div class="testimonial-author">
              <div class="testimonial-avatar">{{ $testimonial['initial'] }}</div>
              <div>
                <div class="testimonial-name">{{ $testimonial['name'] }}</div>
                <div class="testimonial-role">{{ $testimonial['role'] }}</div>
              </div>
            </div>
          </div>
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
    <h2>Ready To Get Racks Built For You?</h2>
    <p>Browse our range or send us your requirement for a custom quote.</p>
    <a href="{{ route('products.index') }}" class="btn mt-4" style="border:2px solid #fff; color:#fff; font-family:var(--font-display); font-weight:600; letter-spacing:0.06em; text-transform:uppercase; border-radius:2px; background:transparent; padding:0.6rem 1.4rem;">Browse Products <i class="fa-solid fa-arrow-right ms-1"></i></a>
  </div>
</section>

@endsection