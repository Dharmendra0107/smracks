<!DOCTYPE html>
<html lang="en">
<head>
{{-- =========================================================
     CHARSET / VIEWPORT
========================================================= --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

{{-- =========================================================
     SEO — TITLE / DESCRIPTION / KEYWORDS
     Every child view MUST set title + meta_description.
     Fallbacks below exist only as a safety net.
========================================================= --}}
<title>@yield('title', 'SM Racks | Metal Rack Manufacturer in Lucknow, Uttar Pradesh')</title>
<meta name="description" content="@yield('meta_description', 'SM Racks is a Lucknow-based manufacturer of supermarket display racks, slotted angle racks, warehouse pallet racks and storage racks. Custom fabrication, bulk pricing, pan-India delivery.')">
<meta name="keywords" content="@yield('meta_keywords', 'metal racks Lucknow, slotted angle rack manufacturer, supermarket display rack, warehouse racks, industrial storage racks India, SM Racks')">
<meta name="robots" content="@yield('robots', 'index, follow')">
<meta name="author" content="SM Racks">
<meta name="geo.region" content="IN-UP">
<meta name="geo.placename" content="Lucknow">

{{-- =========================================================
     CANONICAL — defaults to the current full URL, override
     per-page with @section('canonical') if ever needed
     (e.g. paginated / filtered URLs should self-canonicalize
     or point back to the clean parent URL).
========================================================= --}}
<link rel="canonical" href="@yield('canonical', url()->current())">

{{-- =========================================================
     OPEN GRAPH / TWITTER CARD
========================================================= --}}
<meta property="og:type" content="@yield('og_type', 'website')">
<meta property="og:site_name" content="SM Racks">
<meta property="og:title" content="@yield('og_title')@yield('title', 'SM Racks | Metal Rack Manufacturer in Lucknow, Uttar Pradesh')">
<meta property="og:description" content="@yield('og_description')@yield('meta_description', 'SM Racks is a Lucknow-based manufacturer of supermarket display racks, slotted angle racks, warehouse pallet racks and storage racks.')">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
<meta property="og:locale" content="en_IN">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('title', 'SM Racks')">
<meta name="twitter:description" content="@yield('meta_description', 'Metal rack manufacturer based in Lucknow, Uttar Pradesh.')">
<meta name="twitter:image" content="@yield('og_image', asset('images/og-default.jpg'))">

{{-- =========================================================
     FAVICON
========================================================= --}}
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

{{-- =========================================================
     FONTS / ICONS / FRAMEWORK
========================================================= --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700;800&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

{{-- =========================================================
     SITE-WIDE STRUCTURED DATA (Organization + LocalBusiness)
     Renders on every page. Page-specific schema (Product,
     BreadcrumbList, FAQPage etc.) is pushed via @stack('schema')
     from the child view.
========================================================= --}}
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "HomeAndConstructionBusiness",
  "name": "SM Racks",
  "image": "{{ asset('images/og-default.jpg') }}",
  "url": "{{ url('/') }}",
  "telephone": "+916394309204",
  "priceRange": "₹₹",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Jankipuram",
    "addressLocality": "Lucknow",
    "addressRegion": "Uttar Pradesh",
    "postalCode": "226021",
    "addressCountry": "IN"
  },
  "geo": {
    "@@type": "GeoCoordinates",
    "latitude": 26.8846,
    "longitude": 80.9269
  },
  "openingHoursSpecification": {
    "@@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
    "opens": "09:00",
    "closes": "19:00"
  },
  "sameAs": [
    "https://www.facebook.com/",
    "https://www.instagram.com/",
    "https://www.linkedin.com/"
  ],
  "description": "Manufacturer of industrial, warehouse and supermarket metal racks based in Lucknow, Uttar Pradesh."
}
</script>
@stack('schema')

<style>
/* =========================================================
   GLOBAL DESIGN TOKENS
   Defined ONCE, here only. Do not redeclare :root anywhere
   else (navbar/footer/page blades) — that's what causes
   "last file wins" style bugs across a multi-file build.
========================================================= */
:root{
  --steel-900:#20262c;
  --steel-800:#2b323a;
  --steel-700:#3a424b;
  --steel-600:#5a6470;
  --steel-400:#8b95a1;
  --steel-200:#dde1e5;
  --steel-100:#eef0f2;
  --off-white:#faf9f6;
  --ember-600:#d8420a;
  --ember-500:#f0530f;
  --ember-400:#ff6b1f;
  --font-display:'Oswald', sans-serif;
  --font-body:'Barlow', sans-serif;
}
*{box-sizing:border-box;}
html{scroll-behavior:smooth;}
body{
  font-family:var(--font-body);
  background:var(--off-white);
  color:var(--steel-800);
  overflow-x:hidden;
  animation:pageFadeIn 0.35s ease;
}
h1,h2,h3,h4,.display-font{
  font-family:var(--font-display);
  text-transform:uppercase;
  letter-spacing:0.02em;
}
::selection{background:var(--ember-500); color:#fff;}
@keyframes pageFadeIn{from{opacity:0;} to{opacity:1;}}
a, button{-webkit-tap-highlight-color:transparent;}
a{text-decoration:none; color:inherit;}
a:hover{text-decoration:none;}

/* =========================================================
   SHARED BUTTONS
   Used across every page — keep definitions here only.
========================================================= */
.btn-ember{
  background:var(--ember-500);
  border:none;
  color:#fff;
  font-family:var(--font-display);
  font-weight:600;
  letter-spacing:0.06em;
  text-transform:uppercase;
  padding:0.6rem 1.4rem;
  border-radius:2px;
  transition:all 0.25s ease;
  box-shadow:3px 3px 0 var(--ember-600);
}
.btn-ember:hover{
  background:var(--ember-400);
  color:#fff;
  transform:translate(-2px,-2px);
  box-shadow:5px 5px 0 var(--ember-600);
}
.btn-ember:active{transform:scale(0.97);}
.btn-outline-steel{
  border:2px solid var(--steel-200);
  color:var(--steel-100);
  font-family:var(--font-display);
  font-weight:600;
  letter-spacing:0.06em;
  text-transform:uppercase;
  padding:0.55rem 1.4rem;
  border-radius:2px;
  transition:all 0.25s ease;
  background:transparent;
}
.btn-outline-steel:hover{background:var(--steel-100); color:var(--steel-900);}
.btn-outline-dark-custom{
  border:2px solid var(--steel-800); color:var(--steel-800); font-family:var(--font-display); font-weight:600;
  letter-spacing:0.06em; text-transform:uppercase; padding:0.6rem 1.4rem; border-radius:2px; background:transparent; transition:all 0.25s ease;
}
.btn-outline-dark-custom:hover{background:var(--steel-800); color:#fff;}
.btn-outline-dark-custom:active{transform:scale(0.97);}

/* =========================================================
   SHARED SECTION HEADINGS
========================================================= */
.section-tag{
  font-family:var(--font-display);
  color:var(--ember-600);
  font-size:0.8rem;
  font-weight:700;
  letter-spacing:0.2em;
  text-transform:uppercase;
  margin-bottom:0.6rem;
  display:inline-block;
  position:relative;
  padding-left:2.2rem;
}
.section-tag::before{
  content:'';
  position:absolute; left:0; top:50%; transform:translateY(-50%);
  width:1.8rem; height:2px; background:var(--ember-500);
}
.section-title{
  font-size:clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight:700;
  color:var(--steel-900);
  margin-bottom:1rem;
}
.section-sub{
  color:var(--steel-600);
  max-width:600px;
  font-size:1.02rem;
}

/* =========================================================
   SHARED PRODUCT CARD
   Used on: home, products, product-single (related), use-cases-adjacent.
   Defined once here so all pages render it identically.
========================================================= */
.product-card{
  background:#fff;
  border:1px solid var(--steel-100);
  border-radius:4px;
  overflow:hidden;
  height:100%;
  transition:box-shadow 0.3s ease, transform 0.3s ease;
}
.product-card:hover{box-shadow:0 16px 32px rgba(20,24,28,0.12); transform:translateY(-6px);}
.product-img-wrap{
  height:210px;
  background:var(--steel-100);
  display:flex; align-items:center; justify-content:center;
  position:relative;
  border-bottom:3px solid var(--ember-500);
  overflow:hidden;
}
.product-img-wrap img{width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;}
.product-card:hover .product-img-wrap img{transform:scale(1.08);}
.product-badge{
  position:absolute; top:0.8rem; left:0.8rem;
  background:var(--steel-900);
  color:var(--ember-400);
  font-family:var(--font-display);
  font-size:0.68rem;
  letter-spacing:0.08em;
  text-transform:uppercase;
  padding:0.3rem 0.7rem;
  border-radius:2px;
  z-index:2;
}
.product-card-body{padding:1.4rem;}
.product-card h5{
  font-family:var(--font-display);
  font-size:1.05rem;
  color:var(--steel-900);
  margin-bottom:0.4rem;
}
.product-card p{
  color:var(--steel-600);
  font-size:0.85rem;
  margin-bottom:1rem;
}
.product-card-footer{
  display:flex; align-items:center; justify-content:space-between;
  border-top:1px dashed var(--steel-200);
  padding-top:0.9rem;
}
.btn-view-details{
  font-family:var(--font-display);
  font-size:0.78rem;
  font-weight:600;
  letter-spacing:0.06em;
  text-transform:uppercase;
  color:var(--ember-600);
  text-decoration:none;
  display:flex; align-items:center; gap:0.35rem;
}
.btn-view-details:hover{color:var(--ember-500);}

/* Mobile compact (Flipkart-style) product card — applies wherever
   a .product-card sits inside a 2-col mobile grid via .row.g-4 */
@media(max-width:575px){
  .row.g-4{--bs-gutter-x:0.6rem; --bs-gutter-y:0.6rem;}
  .product-card:hover{transform:none;}
  .product-img-wrap{height:130px; border-bottom-width:2px;}
  .product-card-body{padding:0.6rem 0.7rem;}
  .product-card h5{font-size:0.8rem; margin-bottom:0.3rem; line-height:1.25; min-height:2rem; overflow:hidden;}
  .product-card-footer{border-top:none; padding-top:0.3rem; flex-direction:column; align-items:flex-start; gap:0.3rem;}
  .btn-view-details{font-size:0.68rem;}
  .product-badge{font-size:0.58rem; padding:0.2rem 0.5rem; top:0.5rem; left:0.5rem;}
}

/* =========================================================
   SHARED PAGE HEADER (breadcrumb banner used by inner pages)
========================================================= */
.page-header{
  background:var(--steel-900);
  padding:8rem 0 3rem;
  position:relative;
  overflow:hidden;
}
.page-header::before{
  content:'';
  position:absolute; inset:0;
  background-image:linear-gradient(var(--steel-700) 1px, transparent 1px), linear-gradient(90deg, var(--steel-700) 1px, transparent 1px);
  background-size:50px 50px;
  opacity:0.25;
}
.page-header .container{position:relative;}
.breadcrumb-custom{
  font-family:var(--font-display); font-size:0.78rem; letter-spacing:0.08em; text-transform:uppercase;
  color:var(--steel-400); margin-bottom:0.8rem;
}
.breadcrumb-custom a{color:var(--steel-400); text-decoration:none;}
.breadcrumb-custom a:hover{color:var(--ember-400);}
.breadcrumb-custom .sep{margin:0 0.5rem; color:var(--steel-600);}
.page-header h1{color:#fff; font-size:clamp(1.9rem,4vw,2.8rem); font-weight:800; margin-bottom:0.5rem;}
.page-header p{color:var(--steel-400); max-width:560px; margin:0;}

/* =========================================================
   SHARED CTA BANNER
   Used on: home, products, gallery, use-cases, about.
========================================================= */
.cta-banner{
  background:linear-gradient(120deg, var(--ember-600), var(--ember-500));
  padding:4rem 0;
  position:relative;
  overflow:hidden;
}
.cta-banner::before{
  content:'';
  position:absolute; inset:0;
  background-image:linear-gradient(135deg, rgba(255,255,255,0.08) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.08) 50%, rgba(255,255,255,0.08) 75%, transparent 75%, transparent);
  background-size:40px 40px;
}
.cta-banner h2{color:#fff; font-size:clamp(1.6rem,3vw,2.3rem); margin-bottom:0.5rem;}
.cta-banner p{color:rgba(255,255,255,0.9); margin-bottom:0;}

/* =========================================================
   SHARED STATS STRIP
   Used on: gallery, about, use-cases.
========================================================= */
.stats-strip{background:var(--steel-900); padding:3rem 0;}
.stat-block{text-align:center;}
.stat-num{font-family:var(--font-display); font-weight:800; font-size:2.4rem; color:#fff;}
.stat-num span{color:var(--ember-500);}
.stat-label{font-size:0.78rem; text-transform:uppercase; letter-spacing:0.08em; color:var(--steel-400); margin-top:0.3rem;}

/* =========================================================
   REVEAL-ON-SCROLL ANIMATION (shared)
========================================================= */
.reveal{opacity:0; transform:translateY(30px); transition:opacity 0.7s ease, transform 0.7s ease;}
.reveal.active{opacity:1; transform:translateY(0);}

/* =========================================================
   BACK TO TOP (shared)
========================================================= */
.back-to-top{
  position:fixed; bottom:24px; right:24px; width:46px; height:46px; border-radius:50%;
  background:var(--ember-500); color:#fff; display:flex; align-items:center; justify-content:center;
  box-shadow:0 6px 18px rgba(216,66,10,0.35); opacity:0; visibility:hidden; transform:translateY(10px);
  transition:all 0.3s ease; z-index:999; border:none; cursor:pointer; font-size:1.1rem;
}
.back-to-top.show{opacity:1; visibility:visible; transform:translateY(0);}
.back-to-top:hover{background:var(--ember-400); transform:translateY(-4px); box-shadow:0 10px 22px rgba(216,66,10,0.4);}

/* =========================================================
   PAGE-SPECIFIC CSS goes through @stack('styles') below —
   pushed from each child view with @push('styles'). Never
   redeclare the tokens/classes above inside a page view.
========================================================= */
@stack('styles')
</style>
</head>
<body>

@include('partials.navbar')

<main>
@yield('content')
</main>

@include('partials.footer')

{{-- =========================================================
     GLOBAL SCRIPTS
     Bootstrap bundle + the two cross-page behaviors (reveal
     animation, back-to-top) that need to observe the WHOLE
     rendered page regardless of which page-blade produced it.
     Page-specific JS goes through @stack('scripts').
========================================================= --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
  // Reveal on scroll — observes every .reveal element on the page,
  // regardless of which blade/partial rendered it.
  document.addEventListener('DOMContentLoaded', function () {
    const reveals = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('active');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    reveals.forEach((el) => io.observe(el));

    // Back to top
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
      window.addEventListener('scroll', () => {
        backToTop.classList.toggle('show', window.scrollY > 500);
      });
      backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }
  });
</script>
@stack('scripts')
</body>
</html>