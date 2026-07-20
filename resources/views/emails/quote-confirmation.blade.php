<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
  body{font-family:Arial, sans-serif; background:#f4f3ef; margin:0; padding:0; color:#20262c;}
  .wrap{max-width:560px; margin:0 auto; padding:2rem 1rem;}
  .card{background:#fff; border:1px solid #dde1e5; border-radius:6px; overflow:hidden;}
  .header{background:#20262c; padding:1.4rem 1.6rem;}
  .header span{color:#f0530f; font-weight:800;}
  .header{color:#fff; font-size:1.2rem; font-weight:800; letter-spacing:0.02em;}
  .body{padding:1.8rem 1.6rem;}
  .body h2{font-size:1.15rem; margin-top:0; color:#20262c;}
  .body p{font-size:0.92rem; line-height:1.6; color:#5a6470;}
  .summary{background:#eef0f2; border-radius:4px; padding:1rem 1.2rem; margin:1.2rem 0;}
  .summary .row{padding:0.4rem 0; font-size:0.88rem;}
  .summary .label{color:#8b95a1; display:inline-block; min-width:110px;}
  .summary .value{color:#20262c; font-weight:600;}
  .btn{display:inline-block; background:#f0530f; color:#fff !important; text-decoration:none; padding:0.7rem 1.4rem; border-radius:3px; font-size:0.88rem; font-weight:700; margin-top:0.6rem;}
  .footer{padding:1.2rem 1.6rem; background:#eef0f2; font-size:0.78rem; color:#5a6470; text-align:center;}
</style>
</head>
<body>
<div class="wrap">
  <div class="card">
    <div class="header">SM<span>RACKS</span></div>
    <div class="body">
      <h2>Thanks, {{ $quoteRequest->name }} — we&rsquo;ve got your request.</h2>
      <p>Our team will review your requirement and get back to you within <strong>24 hours</strong> with pricing and availability.</p>

      <div class="summary">
        <div class="row"><span class="label">Quantity</span><span class="value">{{ $quoteRequest->quantity }}</span></div>
        @if($quoteRequest->product)
        <div class="row"><span class="label">Product</span><span class="value">{{ $quoteRequest->product }}</span></div>
        @endif
        @if($quoteRequest->rack_type)
        <div class="row"><span class="label">Rack Type</span><span class="value">{{ $quoteRequest->rack_type }}</span></div>
        @endif
        @if($quoteRequest->delivery_city)
        <div class="row"><span class="label">Delivery City</span><span class="value">{{ $quoteRequest->delivery_city }}</span></div>
        @endif
      </div>

      <p>Need to reach us sooner? Call <strong>+91 63943 09204</strong> or WhatsApp us directly.</p>
      <a href="https://wa.me/916394309204" class="btn">Chat on WhatsApp</a>
    </div>
    <div class="footer">SM Racks &middot; Jankipuram, Lucknow, Uttar Pradesh &middot; gauravmishra3851@gmail.com</div>
  </div>
</div>
</body>
</html>