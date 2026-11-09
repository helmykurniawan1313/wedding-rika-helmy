<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Admin') &middot; Helmy &amp; Rika</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    :root {
        --gold: #a9833f;
        --gold-dark: #8a6d3b;
        --gold-light: #f1e9d8;
        --bg: #f6f3ee;
        --surface: #ffffff;
        --border: #eae4d9;
        --text: #2b2520;
        --muted: #8e8475;
        --muted-2: #b3a996;
        --danger: #c0392b;
        --success: #1e7e42;
        --radius-sm: 8px;
        --radius: 12px;
        --radius-lg: 16px;
        --shadow-sm: 0 1px 2px rgba(43, 37, 32, .05);
        --shadow: 0 1px 2px rgba(43, 37, 32, .04), 0 10px 28px -6px rgba(43, 37, 32, .08);
        --ease: cubic-bezier(.22, 1, .36, 1);
    }
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
        margin: 0;
        font-family: 'Inter', system-ui, sans-serif;
        background: var(--bg);
        color: var(--text);
        -webkit-font-smoothing: antialiased;
        animation: pageIn .4s var(--ease) both;
    }
    @keyframes pageIn {
        from { opacity: 0; transform: translateY(6px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    a { color: inherit; }

    /* Topbar */
    .topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 0 clamp(1rem, 3vw, 2.5rem);
        height: 60px;
        background: rgba(255, 255, 255, .92);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--border);
        position: sticky;
        top: 0;
        z-index: 20;
    }
    .brand { display: flex; align-items: center; gap: .6rem; font-weight: 700; font-size: .95rem; white-space: nowrap; letter-spacing: -.01em; }
    .brand .mark {
        width: 28px; height: 28px; border-radius: 8px;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        color: #fff; display: flex; align-items: center; justify-content: center;
        font-size: .7rem; font-weight: 800; letter-spacing: -.02em;
        box-shadow: 0 2px 6px rgba(169,131,63,.35);
    }
    .brand .sep { color: var(--muted-2); font-weight: 400; }
    .brand .sub { color: var(--muted); font-weight: 500; }

    .nav { display: flex; gap: .2rem; background: var(--bg); padding: .25rem; border-radius: 10px; }
    .nav a {
        display: flex; align-items: center; gap: .4rem;
        padding: .4rem .85rem;
        border-radius: 7px;
        font-size: .825rem;
        font-weight: 600;
        text-decoration: none;
        color: var(--muted);
        transition: background .18s var(--ease), color .18s var(--ease);
    }
    .nav a:hover { color: var(--text); }
    .nav a.active { background: var(--surface); color: var(--gold-dark); box-shadow: var(--shadow-sm); }
    .nav a svg { width: 15px; height: 15px; flex-shrink: 0; }

    .logout-btn {
        display: flex; align-items: center; gap: .4rem;
        background: none;
        border: 1px solid var(--border);
        color: var(--muted);
        padding: .4rem .8rem;
        border-radius: 8px;
        font-size: .825rem;
        font-weight: 500;
        cursor: pointer;
        font-family: inherit;
        transition: border-color .18s var(--ease), color .18s var(--ease), background .18s var(--ease);
    }
    .logout-btn:hover { border-color: #f0c4bd; color: var(--danger); background: #fdf1f0; }
    .logout-btn svg { width: 14px; height: 14px; }

    .container {
        max-width: 1080px;
        margin: 0 auto;
        padding: clamp(1.5rem, 4vw, 2.75rem) clamp(1rem, 3vw, 2rem) 4rem;
    }

    .page-head { margin-bottom: 1.75rem; display: flex; align-items: flex-end; justify-content: space-between; gap: 1rem; flex-wrap: wrap; }
    .page-head h1 { font-size: 1.5rem; margin: 0 0 .3rem; font-weight: 800; letter-spacing: -.02em; }
    .page-head p { margin: 0; color: var(--muted); font-size: .9rem; }

    /* Stat cards */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: .9rem;
        margin-bottom: 1.75rem;
    }
    .stat-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 1.1rem 1.25rem;
        box-shadow: var(--shadow-sm);
        animation: fadeUp .4s var(--ease) both;
        transition: transform .18s var(--ease), box-shadow .18s var(--ease);
    }
    .stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow); }
    .stat-card .label { font-size: .78rem; color: var(--muted); font-weight: 600; display: flex; align-items: center; gap: .4rem; margin-bottom: .5rem; }
    .stat-card .label svg { width: 14px; height: 14px; opacity: .7; }
    .stat-card .value { font-size: 1.6rem; font-weight: 800; letter-spacing: -.02em; line-height: 1; }
    .stat-card .value .of { font-size: .95rem; color: var(--muted-2); font-weight: 600; }

    .card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        transition: box-shadow .2s var(--ease);
        animation: fadeUp .4s var(--ease) both;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .4rem;
        border: none;
        border-radius: var(--radius-sm);
        font-family: inherit;
        font-weight: 600;
        font-size: .875rem;
        cursor: pointer;
        padding: .62rem 1.15rem;
        transition: transform .12s var(--ease), box-shadow .18s var(--ease), background .18s var(--ease);
        white-space: nowrap;
    }
    .btn svg { width: 15px; height: 15px; }
    .btn:active { transform: scale(.96); }
    .btn-primary { background: var(--gold); color: #fff; box-shadow: 0 1px 2px rgba(169,131,63,.3); }
    .btn-primary:hover { background: var(--gold-dark); box-shadow: 0 6px 16px -2px rgba(169,131,63,.4); }
    .btn-ghost { background: #fff; border: 1px solid var(--border); color: var(--muted); }
    .btn-ghost:hover { border-color: #d8d0c2; color: var(--text); background: var(--bg); }
    .btn-danger-ghost { background: #fff; border: 1px solid #f3cbc6; color: var(--danger); }
    .btn-danger-ghost:hover { background: #fdf1f0; border-color: #e8a99f; }
    .btn-sm { padding: .4rem .75rem; font-size: .8rem; }

    .field { display: flex; flex-direction: column; gap: .4rem; }
    .field label { font-size: .8rem; font-weight: 600; color: #5a5248; }
    .field input,
    .field textarea {
        width: 100%;
        padding: .62rem .8rem;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        font-size: .9rem;
        font-family: inherit;
        background: #fff;
        transition: border-color .15s var(--ease), box-shadow .15s var(--ease);
    }
    .field textarea { resize: vertical; min-height: 5.5rem; line-height: 1.5; }
    .field input:focus,
    .field textarea:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3.5px rgba(169,131,63,.13);
    }
    .field input[type="file"] {
        padding: .45rem .6rem;
        font-size: .82rem;
        cursor: pointer;
    }
    .field-hint { font-size: .75rem; color: var(--muted-2); margin-top: -.15rem; }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem 1.25rem;
    }
    .form-grid .field-full { grid-column: 1 / -1; }
    @media (max-width: 680px) {
        .form-grid { grid-template-columns: 1fr; }
    }

    .card-section-header {
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: .6rem;
    }
    .card-section-header .icon {
        width: 34px; height: 34px; border-radius: 9px;
        background: var(--gold-light);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .card-section-header .icon svg { width: 17px; height: 17px; color: var(--gold-dark); }
    .card-section-header h2 { font-size: 1rem; margin: 0; font-weight: 700; letter-spacing: -.01em; }
    .card-section-header p { margin: 0; font-size: .78rem; color: var(--muted); }
    .card-section-body { padding: 1.5rem; }

    .photo-thumb {
        width: 72px; height: 72px;
        border-radius: var(--radius-sm);
        object-fit: cover;
        border: 1px solid var(--border);
        background: var(--bg);
        display: block;
    }

    .repeat-item {
        display: flex;
        gap: 1rem;
        align-items: flex-start;
        padding: 1rem;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        background: #fff;
        margin-bottom: .75rem;
    }
    .repeat-item:last-child { margin-bottom: 0; }
    .repeat-item .repeat-fields { flex: 1; display: flex; flex-direction: column; gap: .6rem; }
    .repeat-item .repeat-actions { display: flex; flex-direction: column; gap: .5rem; align-items: stretch; }

    .search-box { position: relative; }
    .search-box svg {
        position: absolute; left: .75rem; top: 50%; transform: translateY(-50%);
        width: 15px; height: 15px; color: var(--muted-2); pointer-events: none;
    }
    .search-box input { padding-left: 2.1rem; }

    table.admin-table { width: 100%; border-collapse: collapse; font-size: .875rem; }
    table.admin-table thead th {
        text-align: left;
        padding: .75rem 1.25rem;
        font-weight: 700;
        color: var(--muted);
        font-size: .72rem;
        text-transform: uppercase;
        letter-spacing: .04em;
        background: #faf8f3;
        border-bottom: 1px solid var(--border);
    }
    table.admin-table tbody tr {
        border-bottom: 1px solid #f2eee5;
        transition: background .15s var(--ease);
    }
    table.admin-table tbody tr:last-child { border-bottom: none; }
    table.admin-table tbody tr:hover { background: #fbfaf7; }
    table.admin-table td { padding: .75rem 1.25rem; vertical-align: middle; }

    .empty-state {
        padding: 3.5rem 1.5rem;
        text-align: center;
        color: var(--muted);
        font-size: .9rem;
    }
    .empty-state .icon {
        width: 46px; height: 46px; margin: 0 auto .9rem;
        border-radius: 50%; background: var(--gold-light);
        display: flex; align-items: center; justify-content: center;
    }
    .empty-state .icon svg { width: 22px; height: 22px; color: var(--gold-dark); }

    .pill { display: inline-flex; align-items: center; gap: .3rem; padding: .22rem .65rem; border-radius: 999px; background: var(--gold-light); color: var(--gold-dark); font-size: .75rem; font-weight: 600; }
    .pill-dot { width: 6px; height: 6px; border-radius: 50%; }
    .pill-success { background: #e9f6ee; color: var(--success); }
    .pill-neutral { background: #f1efe9; color: var(--muted); }

    .link-chip {
        font-size: .8rem;
        background: #faf8f3;
        border: 1px solid var(--border);
        padding: .32rem .6rem;
        border-radius: var(--radius-sm);
        color: #5a5248;
        font-family: 'SF Mono', Consolas, monospace;
    }
    .copy-btn {
        border: 1px solid var(--border);
        background: #fff;
        border-radius: var(--radius-sm);
        padding: .32rem .6rem;
        font-size: .75rem;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        transition: background .15s var(--ease), border-color .15s var(--ease), color .15s var(--ease);
        display: inline-flex; align-items: center; gap: .3rem;
    }
    .copy-btn:hover { background: var(--bg); border-color: #d8d0c2; }
    .copy-btn.copied { background: #e9f6ee; border-color: #c7e9d3; color: var(--success); }
    .link-row { display: flex; align-items: center; gap: .4rem; flex-wrap: wrap; }

    .alert {
        display: flex; align-items: center; gap: .6rem;
        padding: .75rem 1rem;
        border-radius: var(--radius-sm);
        font-size: .875rem;
        margin-bottom: 1.25rem;
        animation: fadeUp .35s var(--ease) both;
    }
    .alert svg { width: 16px; height: 16px; flex-shrink: 0; }
    .alert-success { background: #e9f6ee; color: var(--success); border: 1px solid #c7e9d3; }
    .alert-error { background: #fdf1f0; color: var(--danger); border: 1px solid #f3cbc6; }

    .pagination-wrap { margin-top: 1.5rem; }
    .pagination-wrap nav { display: flex; justify-content: center; }

    ::placeholder { color: #b8ad9c; }
    ::selection { background: var(--gold-light); }

    @media (max-width: 680px) {
        .topbar { height: 54px; padding: 0 1rem; }
        .brand .sub { display: none; }
        .nav a span { display: none; }
        .nav a { padding: .5rem; }
        .logout-btn span { display: none; }
        .logout-btn { padding: .5rem; }
    }
</style>
@yield('head')
</head>
<body>

@auth
<div class="topbar">
    <div class="brand">
        <span class="mark">HR</span>
        <span>Helmy<span class="sep">&amp;</span>Rika</span>
        <span class="sub">&middot; Admin</span>
    </div>
    <nav class="nav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Ucapan</span>
        </a>
        <a href="{{ route('admin.guests.index') }}" class="{{ request()->routeIs('admin.guests.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
            <span>Tamu</span>
        </a>
        <a href="{{ route('admin.content.edit') }}" class="{{ request()->routeIs('admin.content.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
            <span>Konten</span>
        </a>
    </nav>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
            <span>Logout</span>
        </button>
    </form>
</div>
@endauth

<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any() && !request()->routeIs('admin.login'))
        <div class="alert alert-error">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/></svg>
            {{ $errors->first() }}
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
