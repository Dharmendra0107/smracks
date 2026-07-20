<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login | SM Racks</title>
<meta name="robots" content="noindex, nofollow">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700;800&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
  :root{
    --steel-900:#20262c; --steel-700:#3a424b; --steel-600:#5a6470; --steel-200:#dde1e5;
    --off-white:#faf9f6; --ember-600:#d8420a; --ember-500:#f0530f;
    --font-display:'Oswald', sans-serif; --font-body:'Barlow', sans-serif;
  }
  *{box-sizing:border-box;}
  body{
    font-family:var(--font-body); background:var(--steel-900); min-height:100vh;
    display:flex; align-items:center; justify-content:center; margin:0; padding:1.5rem;
    background-image:linear-gradient(var(--steel-700) 1px, transparent 1px), linear-gradient(90deg, var(--steel-700) 1px, transparent 1px);
    background-size:50px 50px;
  }
  .login-card{
    background:#fff; border-radius:6px; padding:2.5rem 2.2rem; width:100%; max-width:400px;
    box-shadow:0 20px 50px rgba(0,0,0,0.3);
  }
  .brand{font-family:var(--font-display); font-weight:800; font-size:1.6rem; color:var(--steel-900); text-align:center; display:block; margin-bottom:0.3rem;}
  .brand span{color:var(--ember-500);}
  .sub{text-align:center; color:var(--steel-600); font-size:0.85rem; margin-bottom:2rem;}
  .form-label-custom{font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; color:var(--steel-700); margin-bottom:0.4rem; display:block;}
  .form-control-custom{border:1px solid var(--steel-200); border-radius:2px; padding:0.65rem 0.9rem; font-size:0.9rem; width:100%; margin-bottom:1.1rem;}
  .form-control-custom:focus{outline:none; border-color:var(--ember-500);}
  .btn-ember{
    background:var(--ember-500); border:none; color:#fff; font-family:var(--font-display); font-weight:600;
    letter-spacing:0.06em; text-transform:uppercase; padding:0.65rem 1.4rem; border-radius:2px; width:100%;
  }
  .btn-ember:hover{background:var(--ember-600); color:#fff;}
  .error-text{color:var(--ember-600); font-size:0.8rem; margin-top:-0.7rem; margin-bottom:1rem;}
  .back-link{display:block; text-align:center; margin-top:1.5rem; font-size:0.82rem; color:var(--steel-600); text-decoration:none;}
  .back-link:hover{color:var(--ember-600);}
</style>
</head>
<body>
  <div class="login-card">
    <span class="brand">SM<span>RACKS</span></span>
    <p class="sub">Admin Panel</p>

    @if($errors->any())
      <div class="alert alert-danger" style="border-radius:4px; font-size:0.85rem;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf
      <label class="form-label-custom">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" class="form-control-custom" placeholder="admin@smracks.in" required autofocus>

      <label class="form-label-custom">Password</label>
      <input type="password" name="password" class="form-control-custom" placeholder="••••••••" required>

      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember">
        <label class="form-check-label" for="remember" style="font-size:0.85rem; color:var(--steel-600);">Keep me signed in</label>
      </div>

      <button type="submit" class="btn btn-ember">Sign In <i class="fa-solid fa-arrow-right ms-1"></i></button>
    </form>

    <a href="{{ route('home') }}" class="back-link"><i class="fa-solid fa-arrow-left me-1"></i> Back to website</a>
  </div>
</body>
</html>