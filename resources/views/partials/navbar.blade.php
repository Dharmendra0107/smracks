{{-- =========================================================
     NAVBAR PARTIAL
     Self-contained: HTML + CSS (classes unique to this partial
     only — no collision risk with page blades) + its own JS.
     Uses named routes so active states work automatically
     without hardcoding URLs.

     DESKTOP (≥992px): standard horizontal nav, unchanged.
     MOBILE (<992px): custom slide-in drawer from the right
     with a dark backdrop, icon-led links, and pinned CTA
     buttons at the bottom — replaces Bootstrap's default
     vertical collapse dropdown, matching the same drawer
     pattern already used for the mobile filter sheet on the
     products page.
========================================================= --}}
<nav class="navbar navbar-expand-lg navbar-industrial fixed-top" aria-label="Primary navigation">
  <div class="container">
    <a class="navbar-brand navbar-brand-custom" href="{{ route('home') }}" aria-label="SM Racks — Home">
      SM<span>RACKS</span>
    </a>

    <div class="d-flex align-items-center gap-2 d-lg-none">
      <a href="tel:+916394309204" class="btn-nav-call-mobile" aria-label="Call SM Racks">
        <i class="fa-solid fa-phone"></i>
      </a>
      <button class="navbar-toggler-custom" type="button" id="navDrawerOpen" aria-controls="navDrawer" aria-expanded="false" aria-label="Open menu">
        <span></span><span></span><span></span>
      </button>
    </div>

    {{-- DESKTOP NAV --}}
    <div class="collapse navbar-collapse d-none d-lg-flex" id="navMainDesktop">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('use-cases') ? 'active' : '' }}" href="{{ route('use-cases') }}">Where To Use</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Our Work</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('bulk-order') ? 'active' : '' }}" href="{{ route('bulk-order') }}">Bulk Orders</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
      </ul>
      <div class="d-flex gap-2 align-items-center">
        <a href="tel:+916394309204" class="btn btn-sm btn-nav-call">
          <i class="fa-solid fa-phone me-1"></i> Call Us
        </a>
        <a href="{{ route('bulk-order') }}" class="btn btn-ember btn-sm">Get Quote</a>
      </div>
    </div>
  </div>
</nav>

{{-- MOBILE DRAWER --}}
<div class="nav-drawer-backdrop" id="navDrawerBackdrop"></div>
<div class="nav-drawer d-lg-none" id="navDrawer" aria-hidden="true">
  <div class="nav-drawer-header">
    <span class="navbar-brand-custom">SM<span>RACKS</span></span>
    <button class="nav-drawer-close" id="navDrawerClose" aria-label="Close menu"><i class="fa-solid fa-xmark"></i></button>
  </div>

  <ul class="nav-drawer-links">
    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Home</a></li>
    <li><a href="{{ route('products.index') }}" class="{{ request()->routeIs('products*') ? 'active' : '' }}"><i class="fa-solid fa-warehouse"></i> Products</a></li>
    <li><a href="{{ route('use-cases') }}" class="{{ request()->routeIs('use-cases') ? 'active' : '' }}"><i class="fa-solid fa-lightbulb"></i> Where To Use</a></li>
    <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}"><i class="fa-solid fa-images"></i> Our Work</a></li>
    <li><a href="{{ route('bulk-order') }}" class="{{ request()->routeIs('bulk-order') ? 'active' : '' }}"><i class="fa-solid fa-tags"></i> Bulk Orders</a></li>
    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}"><i class="fa-solid fa-circle-info"></i> About</a></li>
  </ul>

  <div class="nav-drawer-footer">
    <a href="tel:+916394309204" class="btn btn-nav-call w-100 mb-2">
      <i class="fa-solid fa-phone me-1"></i> Call Us
    </a>
    <a href="{{ route('bulk-order') }}" class="btn btn-ember w-100">Get Quote</a>
    <div class="nav-drawer-contact">
      <a href="https://wa.me/916394309204" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a>
      <a href="mailto:gauravmishra3851@gmail.com"><i class="fa-solid fa-envelope"></i></a>
    </div>
  </div>
</div>

<style>
/* Scoped to this partial only. */
.navbar-industrial{
  background:rgba(250,249,246,0.92);
  backdrop-filter:blur(10px);
  border-bottom:3px solid var(--ember-500);
  padding:0.9rem 0;
  box-shadow:0 2px 20px rgba(32,38,44,0.06);
  transition:padding 0.25s ease;
}
.navbar-brand-custom{
  font-family:var(--font-display);
  font-weight:800;
  font-size:1.5rem;
  color:var(--steel-900) !important;
  letter-spacing:0.03em;
}
.navbar-brand-custom span{color:var(--ember-500);}
.nav-link-custom{
  font-family:var(--font-display);
  font-weight:500;
  font-size:0.85rem;
  letter-spacing:0.08em;
  text-transform:uppercase;
  color:var(--steel-600) !important;
  padding:0.5rem 1rem !important;
  position:relative;
  transition:color 0.25s ease;
}
.nav-link-custom::after{
  content:'';
  position:absolute; left:1rem; right:1rem; bottom:0.1rem; height:2px;
  background:var(--ember-500);
  transform:scaleX(0); transform-origin:left;
  transition:transform 0.3s ease;
}
.nav-link-custom:hover, .nav-link-custom.active{color:var(--steel-900) !important;}
.nav-link-custom:hover::after, .nav-link-custom.active::after{transform:scaleX(1);}
.btn-nav-call{
  border:2px solid var(--steel-800);
  color:var(--steel-800);
  font-family:var(--font-display);
  font-weight:600;
  letter-spacing:0.06em;
  text-transform:uppercase;
  border-radius:2px;
  background:transparent;
  transition:all 0.2s ease;
}
.btn-nav-call:hover{background:var(--steel-800); color:#fff;}

/* ---- Mobile call icon button (next to hamburger) ---- */
.btn-nav-call-mobile{
  width:38px; height:38px; border-radius:50%;
  border:1.5px solid var(--steel-800);
  display:flex; align-items:center; justify-content:center;
  color:var(--steel-800); font-size:0.9rem; flex-shrink:0;
  transition:all 0.2s ease;
}
.btn-nav-call-mobile:active{background:var(--steel-800); color:#fff; transform:scale(0.95);}

/* ---- Custom hamburger (3-line, animates to X when drawer open) ---- */
.navbar-toggler-custom{
  width:38px; height:38px; border-radius:4px;
  border:1.5px solid var(--steel-800);
  background:transparent;
  display:flex; flex-direction:column; align-items:center; justify-content:center; gap:5px;
  flex-shrink:0; padding:0;
}
.navbar-toggler-custom span{
  display:block; width:18px; height:2px; background:var(--steel-800);
  transition:transform 0.3s ease, opacity 0.2s ease;
}
.navbar-toggler-custom.open span:nth-child(1){transform:translateY(7px) rotate(45deg);}
.navbar-toggler-custom.open span:nth-child(2){opacity:0;}
.navbar-toggler-custom.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg);}

/* ---- Drawer backdrop ---- */
.nav-drawer-backdrop{
  position:fixed; inset:0; background:rgba(20,24,28,0.55); z-index:1049;
  opacity:0; visibility:hidden; transition:opacity 0.3s ease, visibility 0.3s ease;
}
.nav-drawer-backdrop.show{opacity:1; visibility:visible;}

/* ---- Drawer panel ---- */
.nav-drawer{
  position:fixed; top:0; right:0; bottom:0; width:82%; max-width:320px;
  background:#fff; z-index:1050;
  transform:translateX(100%);
  transition:transform 0.32s cubic-bezier(0.22, 0.61, 0.36, 1);
  display:flex; flex-direction:column;
  box-shadow:-8px 0 30px rgba(20,24,28,0.25);
}
.nav-drawer.show{transform:translateX(0);}
.nav-drawer-header{
  display:flex; align-items:center; justify-content:space-between;
  padding:1.2rem 1.3rem; border-bottom:1px solid var(--steel-200);
}
.nav-drawer-close{
  width:34px; height:34px; border-radius:50%; border:none; background:var(--steel-100);
  color:var(--steel-700); display:flex; align-items:center; justify-content:center;
}
.nav-drawer-links{
  list-style:none; margin:0; padding:0.6rem 0; flex:1; overflow-y:auto;
}
.nav-drawer-links li a{
  display:flex; align-items:center; gap:0.9rem;
  padding:0.95rem 1.3rem;
  font-family:var(--font-display); font-size:0.92rem; letter-spacing:0.03em; text-transform:uppercase;
  color:var(--steel-700); text-decoration:none;
  border-left:3px solid transparent;
  transition:background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
}
.nav-drawer-links li a i{width:20px; text-align:center; color:var(--ember-500); font-size:0.95rem;}
.nav-drawer-links li a:active{background:var(--steel-100);}
.nav-drawer-links li a.active{
  color:var(--steel-900); border-left-color:var(--ember-500); background:rgba(240,83,15,0.05); font-weight:600;
}
.nav-drawer-footer{
  padding:1.1rem 1.3rem 1.4rem; border-top:1px solid var(--steel-200);
}
.nav-drawer-contact{
  display:flex; justify-content:center; gap:0.9rem; margin-top:1rem;
}
.nav-drawer-contact a{
  width:40px; height:40px; border-radius:50%; background:var(--steel-100);
  color:var(--steel-700); display:flex; align-items:center; justify-content:center; font-size:1rem;
}
.nav-drawer-contact a:active{background:var(--ember-500); color:#fff;}

/* Prevent background scroll while drawer is open */
body.nav-drawer-open{overflow:hidden;}
</style>

<script>
  // Navbar shrink-on-scroll + mobile drawer open/close.
  document.addEventListener('DOMContentLoaded', function () {
    const nav = document.querySelector('.navbar-industrial');
    if (nav) {
      window.addEventListener('scroll', () => {
        nav.style.padding = window.scrollY > 40 ? '0.55rem 0' : '0.9rem 0';
      });
    }

    const drawer = document.getElementById('navDrawer');
    const backdrop = document.getElementById('navDrawerBackdrop');
    const openBtn = document.getElementById('navDrawerOpen');
    const closeBtn = document.getElementById('navDrawerClose');

    function openDrawer() {
      drawer.classList.add('show');
      backdrop.classList.add('show');
      openBtn.classList.add('open');
      drawer.setAttribute('aria-hidden', 'false');
      openBtn.setAttribute('aria-expanded', 'true');
      document.body.classList.add('nav-drawer-open');
    }
    function closeDrawer() {
      drawer.classList.remove('show');
      backdrop.classList.remove('show');
      openBtn.classList.remove('open');
      drawer.setAttribute('aria-hidden', 'true');
      openBtn.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('nav-drawer-open');
    }

    if (openBtn) openBtn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (backdrop) backdrop.addEventListener('click', closeDrawer);

    // Close drawer automatically if the viewport is resized past
    // the mobile breakpoint (e.g. rotating a tablet to landscape).
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 992) closeDrawer();
    });
  });
</script>