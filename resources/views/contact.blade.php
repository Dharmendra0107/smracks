@extends('layouts.app')

@section('title', 'Contact Us | SM Racks - Metal Rack Manufacturer, Lucknow')
@section('meta_description', 'Get in touch with SM Racks — questions about our metal racks, bulk orders, or anything else. Call, WhatsApp, or send us a message and we\'ll reply within 24 hours.')
@section('meta_keywords', 'contact SM Racks, metal rack manufacturer contact Lucknow, rack inquiry')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@@type":"ListItem","position":2,"name":"Contact","item":"{{ route('contact') }}"}
  ]
}
</script>
@endpush

@push('styles')
.contact-section{padding:4.5rem 0 6rem;}
.contact-form-card{background:#fff; border:1px solid var(--steel-200); border-radius:4px; padding:2.2rem; box-shadow:0 10px 30px rgba(32,38,44,0.06);}
.contact-form-card h3{color:var(--steel-900); font-size:1.4rem; margin-bottom:0.4rem;}
.contact-form-card > p{color:var(--steel-600); font-size:0.9rem; margin-bottom:1.6rem;}
.form-label-custom{font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; color:var(--steel-700); margin-bottom:0.4rem; display:block;}
.form-control-custom{border:1px solid var(--steel-200); border-radius:2px; padding:0.65rem 0.9rem; font-size:0.9rem; width:100%; margin-bottom:1.1rem;}
.form-control-custom:focus{outline:none; border-color:var(--ember-500);}
.side-info-card{background:var(--steel-900); border-radius:4px; padding:2rem; color:#fff; margin-bottom:1.2rem;}
.side-info-card h5{font-family:var(--font-display); font-size:1.05rem; margin-bottom:1rem;}
.side-info-card .contact-line{color:var(--steel-200);}
.side-info-card .contact-line i{color:var(--ember-500);}
.contact-map-card{border-radius:4px; overflow:hidden; border:1px solid var(--steel-200); height:220px;}
.contact-map-card iframe{width:100%; height:100%; border:0; display:block;}
@endpush

@section('content')

<section class="page-header">
  <div class="container">
    <div class="breadcrumb-custom">
      <a href="{{ route('home') }}">Home</a><span class="sep">/</span><span style="color:var(--ember-400);">Contact</span>
    </div>
    <h1>Get In Touch</h1>
    <p>Questions about a rack, a bulk order, or anything else — send us a message and we'll reply within 24 hours.</p>
  </div>
</section>

<section class="contact-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="contact-form-card">
          <h3>Send Us a Message</h3>
          <p>No product or quantity needed — just tell us what's on your mind.</p>

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
            <input type="hidden" name="source" value="Contact Us Page">

            <div class="row">
              <div class="col-md-6">
                <label class="form-label-custom">Full Name*</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control-custom" placeholder="Your name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-custom">Phone Number*</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control-custom" placeholder="+91" required>
              </div>
            </div>

            <label class="form-label-custom">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control-custom" placeholder="you@company.com">

            <label class="form-label-custom">Message*</label>
            <textarea name="message" rows="5" class="form-control-custom" placeholder="How can we help?" required>{{ old('message') }}</textarea>

            <button type="submit" class="btn btn-ember w-100 mt-1">Send Message <i class="fa-solid fa-paper-plane ms-1"></i></button>
          </form>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="side-info-card">
          <h5>Contact Details</h5>
          <div class="contact-line"><i class="fa-solid fa-phone"></i><span>+91 63943 09204, +91 95698 11406</span></div>
          <div class="contact-line"><i class="fa-solid fa-envelope"></i><span>gauravmishra3851@gmail.com</span></div>
          <div class="contact-line"><i class="fa-solid fa-location-dot"></i><span>Jankipuram, Lucknow, Uttar Pradesh</span></div>
          <div class="contact-line"><i class="fa-solid fa-clock"></i><span>Mon&ndash;Sat: 9:00 AM &ndash; 7:00 PM</span></div>
          <a href="https://wa.me/916394309204" target="_blank" rel="noopener noreferrer" class="btn btn-ember w-100 mt-2"><i class="fa-brands fa-whatsapp me-1"></i> Chat on WhatsApp</a>
        </div>

        <div class="contact-map-card">
          <iframe src="https://www.google.com/maps?q=Jankipuram,Lucknow,Uttar+Pradesh&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="SM Racks location — Jankipuram, Lucknow"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection