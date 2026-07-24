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
  .header, .header a{color:#fff; text-decoration:none; font-size:1.2rem; font-weight:800; letter-spacing:0.02em;}
  .body{padding:1.6rem;}
  .row{padding:0.7rem 0; border-bottom:1px solid #eef0f2;}
  .row:last-child{border-bottom:none;}
  .label{font-size:0.72rem; text-transform:uppercase; letter-spacing:0.06em; color:#8b95a1; margin-bottom:0.2rem;}
  .value{font-size:0.95rem; color:#20262c;}
  .footer{padding:1.2rem 1.6rem; background:#eef0f2; font-size:0.78rem; color:#5a6470; text-align:center;}
</style>
</head>
<body>
<div class="wrap">
  <div class="card">
    <div class="header"><img src="{{ asset('images/logo/logo.png') }}" alt="SM Racks" style="height:32px; width:auto; display:block;"></div>
    <div class="body">
      <p style="margin-top:0;">A new quote request just came in from the website:</p>

      <div class="row">
        <div class="label">Name</div>
        <div class="value">{{ $quoteRequest->name }}</div>
      </div>
      <div class="row">
        <div class="label">Phone</div>
        <div class="value">{{ $quoteRequest->phone }}</div>
      </div>
      @if($quoteRequest->email)
      <div class="row">
        <div class="label">Email</div>
        <div class="value">{{ $quoteRequest->email }}</div>
      </div>
      @endif
      @if($quoteRequest->company)
      <div class="row">
        <div class="label">Company</div>
        <div class="value">{{ $quoteRequest->company }}</div>
      </div>
      @endif
      <div class="row">
        <div class="label">Source</div>
        <div class="value">{{ $quoteRequest->source ?? 'Website' }}</div>
      </div>
      @if($quoteRequest->quantity)
      <div class="row">
        <div class="label">Quantity</div>
        <div class="value">{{ $quoteRequest->quantity }}</div>
      </div>
      @endif
      @if($quoteRequest->product)
      <div class="row">
        <div class="label">Product</div>
        <div class="value">{{ $quoteRequest->product }}</div>
      </div>
      @endif
      @if($quoteRequest->rack_type)
      <div class="row">
        <div class="label">Rack Type</div>
        <div class="value">{{ $quoteRequest->rack_type }}</div>
      </div>
      @endif
      @if($quoteRequest->delivery_city)
      <div class="row">
        <div class="label">Delivery City</div>
        <div class="value">{{ $quoteRequest->delivery_city }}</div>
      </div>
      @endif
      @if($quoteRequest->message)
      <div class="row">
        <div class="label">Message</div>
        <div class="value">{{ $quoteRequest->message }}</div>
      </div>
      @endif
    </div>
    <div class="footer">Submitted {{ $quoteRequest->created_at->format('d M Y, h:i A') }} via smracks website</div>
  </div>
</div>
</body>
</html>