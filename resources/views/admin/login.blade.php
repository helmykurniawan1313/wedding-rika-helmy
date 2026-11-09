@extends('admin.layout')

@section('title', 'Login')

@section('head')
<style>
    body { background: radial-gradient(circle at 50% 0%, #fbf8f2 0%, var(--bg) 60%); }
    .login-wrap { min-height: calc(100vh - 2rem); display: flex; align-items: center; justify-content: center; padding: 1rem; }
    .login-card { width: 100%; max-width: 380px; padding: 2.5rem 2.25rem; animation: cardIn .5s var(--ease) both; }
    @keyframes cardIn {
        from { opacity: 0; transform: translateY(14px) scale(.97); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .login-badge {
        width: 52px; height: 52px; border-radius: 14px;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        color: #fff; display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; font-weight: 800; font-size: .85rem; letter-spacing: -.02em;
        box-shadow: 0 6px 18px -4px rgba(169,131,63,.45);
    }
</style>
@endsection

@section('content')
<div class="login-wrap">
    <div class="card login-card">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div class="login-badge">H&amp;R</div>
            <h1 style="font-size: 1.2rem; margin: 0; font-weight: 800; letter-spacing: -.02em;">Admin Login</h1>
            <p style="color: var(--muted); font-size: .85rem; margin: .3rem 0 0;">Kelola tamu &amp; ucapan undangan</p>
        </div>

        <form method="POST" action="{{ route('admin.login.submit') }}" style="display: flex; flex-direction: column; gap: 1.1rem;">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: .3rem;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection
