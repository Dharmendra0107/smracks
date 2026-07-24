<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Dashboard') | SM Racks Admin</title>
<meta name="robots" content="noindex, nofollow">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700;800&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
  :root{
    --steel-900:#20262c; --steel-800:#2b323a; --steel-700:#3a424b; --steel-600:#5a6470;
    --steel-400:#8b95a1; --steel-200:#dde1e5; --steel-100:#eef0f2; --off-white:#faf9f6;
    --ember-600:#d8420a; --ember-500:#f0530f;
    --font-display:'Oswald', sans-serif; --font-body:'Barlow', sans-serif;
  }
  *{box-sizing:border-box;}
  body{font-family:var(--font-body); background:var(--off-white); color:var(--steel-800); margin:0;}
  h1,h2,h3,h4{font-family:var(--font-display);}
  a{text-decoration:none;}

  .admin-shell{display:flex; min-height:100vh;}

  /* SIDEBAR */
  .admin-sidebar{
    width:230px; background:var(--steel-900); flex-shrink:0; position:fixed; top:0; bottom:0; left:0;
    display:flex; flex-direction:column; z-index:100; transition:transform 0.25s ease;
  }
  .admin-brand{padding:1.4rem 1.3rem; border-bottom:1px solid var(--steel-700);}
  .admin-brand span{font-family:var(--font-display); font-weight:800; font-size:1.2rem; color:#fff;}
  .admin-brand span em{color:var(--ember-500); font-style:normal;}
  .admin-brand small{display:block; color:var(--steel-400); font-size:0.7rem; letter-spacing:0.08em; text-transform:uppercase; margin-top:0.2rem;}
  .admin-logo-img{height:32px; width:auto; display:block;}
  .admin-nav{flex:1; padding:1rem 0.7rem;}
  .admin-nav a{
    display:flex; align-items:center; gap:0.8rem; padding:0.75rem 0.9rem; border-radius:4px;
    color:var(--steel-400); font-family:var(--font-display); font-size:0.85rem; letter-spacing:0.02em;
    margin-bottom:0.2rem; transition:all 0.15s ease;
  }
  .admin-nav a i{width:18px; text-align:center;}
  .admin-nav a:hover{background:var(--steel-800); color:#fff;}
  .admin-nav a.active{background:var(--ember-500); color:#fff;}
  .admin-sidebar-footer{padding:1rem 0.9rem; border-top:1px solid var(--steel-700);}
  .admin-sidebar-footer a{color:var(--steel-400); font-size:0.82rem; display:flex; align-items:center; gap:0.6rem; padding:0.5rem;}
  .admin-sidebar-footer a:hover{color:#fff;}

  /* MAIN */
  .admin-main{margin-left:230px; flex:1; min-width:0;}
  .admin-topbar{
    background:#fff; border-bottom:1px solid var(--steel-200); padding:1rem 1.6rem;
    display:flex; align-items:center; justify-content:space-between; position:sticky; top:0; z-index:50;
  }
  .admin-topbar h1{font-size:1.15rem; color:var(--steel-900); margin:0; text-transform:uppercase; letter-spacing:0.02em;}
  .admin-content{padding:1.8rem;}
  .sidebar-toggle{display:none; background:none; border:1px solid var(--steel-200); border-radius:4px; width:36px; height:36px; color:var(--steel-700);}

  /* SHARED ADMIN COMPONENTS */
  .admin-card{background:#fff; border:1px solid var(--steel-200); border-radius:6px; padding:1.5rem;}
  .btn-ember{background:var(--ember-500); border:none; color:#fff; font-family:var(--font-display); font-weight:600; letter-spacing:0.04em; text-transform:uppercase; padding:0.55rem 1.2rem; border-radius:3px; font-size:0.82rem;}
  .btn-ember:hover{background:var(--ember-600); color:#fff;}
  .btn-outline-custom{background:transparent; border:1px solid var(--steel-200); color:var(--steel-700); font-family:var(--font-display); font-weight:600; letter-spacing:0.04em; text-transform:uppercase; padding:0.55rem 1.2rem; border-radius:3px; font-size:0.82rem;}
  .btn-outline-custom:hover{background:var(--steel-100); color:var(--steel-900);}
  .btn-danger-custom{background:transparent; border:1px solid #dc3545; color:#dc3545; font-family:var(--font-display); font-weight:600; letter-spacing:0.04em; text-transform:uppercase; padding:0.4rem 0.9rem; border-radius:3px; font-size:0.76rem;}
  .btn-danger-custom:hover{background:#dc3545; color:#fff;}
  .admin-table{width:100%; border-collapse:collapse;}
  .admin-table th{
    text-align:left; font-family:var(--font-display); font-size:0.72rem; letter-spacing:0.06em; text-transform:uppercase;
    color:var(--steel-600); padding:0.8rem; border-bottom:2px solid var(--steel-200);
  }
  .admin-table td{padding:0.9rem 0.8rem; border-bottom:1px solid var(--steel-100); font-size:0.88rem; vertical-align:middle;}
  .admin-table tr:hover td{background:var(--steel-100);}
  .status-badge{font-family:var(--font-display); font-size:0.68rem; letter-spacing:0.05em; text-transform:uppercase; padding:0.25rem 0.6rem; border-radius:20px;}
  .source-badge{
    font-family:var(--font-display); font-size:0.68rem; letter-spacing:0.03em; text-transform:uppercase;
    padding:0.25rem 0.6rem; border-radius:4px; background:var(--steel-100); color:var(--steel-700); white-space:nowrap;
  }
  .status-new{background:rgba(240,83,15,0.12); color:var(--ember-600);}
  .status-contacted{background:rgba(13,110,253,0.1); color:#0d6efd;}
  .status-closed{background:rgba(25,135,84,0.1); color:#198754;}
  .form-label-custom{font-family:var(--font-display); font-size:0.75rem; letter-spacing:0.06em; text-transform:uppercase; color:var(--steel-700); margin-bottom:0.4rem; display:block;}
  .form-control-custom{border:1px solid var(--steel-200); border-radius:3px; padding:0.6rem 0.85rem; font-size:0.88rem; width:100%; margin-bottom:1rem;}
  .form-control-custom:focus{outline:none; border-color:var(--ember-500);}

  @media(max-width:900px){
    .admin-sidebar{transform:translateX(-100%);}
    .admin-sidebar.show{transform:translateX(0);}
    .admin-main{margin-left:0;}
    .sidebar-toggle{display:inline-flex; align-items:center; justify-content:center;}
    .admin-table{display:block; overflow-x:auto; white-space:nowrap;}
  }
</style>
@stack('styles')
</head>
<body>
<div class="admin-shell">

  <aside class="admin-sidebar" id="adminSidebar">
    <div class="admin-brand">
      <img src="{{ asset('images/logo/logo.png') }}" alt="SM Racks" class="admin-logo-img">
      <small>Admin Panel</small>
    </div>
    <nav class="admin-nav">
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
      <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}"><i class="fa-solid fa-warehouse"></i> Products</a>
      <a href="{{ route('admin.quotes.index') }}" class="{{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}"><i class="fa-solid fa-envelope"></i> Quote Requests</a>
      <a href="{{ route('home') }}" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> View Site</a>
    </nav>
    <div class="admin-sidebar-footer">
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" style="background:none; border:none; padding:0; width:100%; text-align:left;" class="d-flex align-items-center gap-2">
          <i class="fa-solid fa-right-from-bracket"></i> <span style="color:var(--steel-400); font-size:0.82rem;">Logout ({{ auth()->user()->name ?? 'Admin' }})</span>
        </button>
      </form>
    </div>
  </aside>

  <div class="admin-main">
    <div class="admin-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
        <h1>@yield('title', 'Dashboard')</h1>
      </div>
      <div>@yield('topbar-actions')</div>
    </div>
    <div class="admin-content">
      @if(session('success'))
        <div class="alert alert-success" style="border-radius:4px;">{{ session('success') }}</div>
      @endif
      @yield('content')
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('sidebarToggle')?.addEventListener('click', () => {
    document.getElementById('adminSidebar').classList.toggle('show');
  });
</script>
@stack('scripts')
</body>
</html>