{{-- =========================================================
     FOOTER PARTIAL
     Self-contained: HTML + CSS (classes unique to this partial)
     + the back-to-top button markup. Its click behavior lives
     in app.blade.php's global script since it needs to observe
     window scroll regardless of which page is loaded.

     itemscope/itemtype microdata reinforces the same NAP
     (Name/Address/Phone) data as the JSON-LD in app.blade —
     belt-and-braces for local SEO.
========================================================= --}}
<footer class="footer-industrial" id="contact" itemscope itemtype="https://schema.org/LocalBusiness">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <span class="footer-brand" itemprop="name">SM<span>RACKS</span></span>
        <p style="font-size:0.9rem; color:var(--steel-400);">
          Lucknow-based manufacturer of premium industrial, warehouse &amp; supermarket metal racks.
          Serving businesses across India since 2013.
        </p>
        <div class="footer-social mt-3">
          <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="SM Racks on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="SM Racks on Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer" aria-label="SM Racks on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="https://wa.me/916394309204" target="_blank" rel="noopener noreferrer" aria-label="Chat with SM Racks on WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
      </div>

      <div class="col-6 col-lg-2">
        <h5>Quick Links</h5>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('use-cases') }}">Where To Use</a>
        <a href="{{ route('gallery') }}">Our Work</a>
        <a href="{{ route('bulk-order') }}">Bulk Orders</a>
        <a href="{{ route('about') }}">About Us</a>
      </div>

      <div class="col-6 col-lg-2">
        <h5>Categories</h5>
        <a href="{{ route('products.index', ['cat' => 'supermarket']) }}">Supermarket Racks</a>
        <a href="{{ route('products.index', ['cat' => 'slotted-angle']) }}">Slotted Angle Racks</a>
        <a href="{{ route('products.index', ['cat' => 'warehouse']) }}">Warehouse Racks</a>
        <a href="{{ route('products.index', ['cat' => 'storage']) }}">Storage Racks</a>
      </div>

      <div class="col-lg-4">
        <h5>Contact Us</h5>
        <div class="contact-line" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          <i class="fa-solid fa-location-dot"></i>
          <span><span itemprop="streetAddress">Jankipuram</span>, <span itemprop="addressLocality">Lucknow</span>, <span itemprop="addressRegion">Uttar Pradesh</span>, India</span>
        </div>
        <div class="contact-line">
          <i class="fa-solid fa-phone"></i>
          <span itemprop="telephone">+91 63943 09204, +91 95698 11406</span>
        </div>
        <div class="contact-line">
          <i class="fa-solid fa-envelope"></i>
          <span itemprop="email">gauravmishra3851@gmail.com</span>
        </div>
        <div class="contact-line">
          <i class="fa-solid fa-clock"></i>
          <span>Mon&ndash;Sat: 9:00 AM &ndash; 7:00 PM</span>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      &copy; {{ date('Y') }} SM Racks. All rights reserved. | Manufactured &amp; Shipped from Lucknow, UP.
    </div>
  </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="Back to top">
  <i class="fa-solid fa-arrow-up"></i>
</button>

<style>
/* Scoped to this partial only. */
.footer-industrial{background:var(--steel-900); padding:4.5rem 0 1.5rem; color:var(--steel-400);}
.footer-industrial h5{font-family:var(--font-display); color:#fff; font-size:1rem; margin-bottom:1.2rem;}
.footer-industrial a{
  color:var(--steel-400); text-decoration:none; font-size:0.88rem; display:block; margin-bottom:0.6rem; transition:color 0.2s ease;
}
.footer-industrial a:hover{color:var(--ember-500);}
.footer-brand{
  font-family:var(--font-display); font-weight:800; font-size:1.4rem; color:#fff; margin-bottom:1rem; display:block;
}
.footer-brand span{color:var(--ember-500);}
.footer-social a{
  display:inline-flex; width:38px; height:38px; align-items:center; justify-content:center;
  background:var(--steel-800); border:1px solid var(--steel-700); border-radius:2px; margin-right:0.5rem;
}
.footer-social a:hover{background:var(--ember-500); border-color:var(--ember-500); color:#fff;}
.footer-bottom{
  border-top:1px solid var(--steel-700); margin-top:3rem; padding-top:1.5rem;
  font-size:0.8rem; color:var(--steel-600); text-align:center;
}
.contact-line{display:flex; gap:0.7rem; margin-bottom:0.8rem; font-size:0.88rem;}
.contact-line i{color:var(--ember-500); margin-top:0.2rem;}
</style>
