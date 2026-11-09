@extends('admin.layout')

@section('title', 'Tamu')

@section('content')
<div class="page-head">
    <div>
        <h1>Daftar Tamu</h1>
        <p>Tautan undangan hanya aktif untuk tamu yang terdaftar di sini</p>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card" style="animation-delay: .02s;">
        <div class="label">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            Total Tamu
        </div>
        <div class="value">{{ $totalGuests }}</div>
    </div>
    <div class="stat-card" style="animation-delay: .06s;">
        <div class="label">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
            Sudah Berkunjung
        </div>
        <div class="value">{{ $visitedGuests }} <span class="of">/ {{ $totalGuests }}</span></div>
    </div>
</div>

<div class="card" style="padding: 1.5rem; margin-bottom: 1.25rem; animation-delay: .1s;">
    <form method="POST" action="{{ route('admin.guests.store') }}" style="display: flex; gap: .75rem; flex-wrap: wrap; align-items: flex-end;">
        @csrf
        <div class="field" style="flex: 1 1 220px;">
            <label>Nama Tamu</label>
            <input type="text" name="name" placeholder="Budi Santoso" required value="{{ old('name') }}">
        </div>
        <div class="field" style="flex: 1 1 180px;">
            <label>Kategori (opsional)</label>
            <input type="text" name="category" placeholder="Teman Kantor" value="{{ old('category') }}">
        </div>
        <button type="submit" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Tamu
        </button>
    </form>
</div>

<div class="card" style="padding: .9rem 1.5rem; margin-bottom: 1.25rem; animation-delay: .14s;">
    <form method="GET" action="{{ route('admin.guests.index') }}" class="search-box">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama atau kategori tamu..."
            oninput="this.form.requestSubmit()">
    </form>
</div>

<div class="card" style="overflow: hidden; animation-delay: .18s;">
    @if ($guests->isEmpty())
        <div class="empty-state">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            </div>
            @if ($search !== '')
                Tidak ada tamu yang cocok dengan "{{ $search }}".
            @else
                Belum ada tamu. Tambahkan tamu pertama di atas.
            @endif
        </div>
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tautan Undangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                    @php $link = url('/invite/'.$guest->slug); @endphp
                    <tr style="animation: fadeUp .35s var(--ease) both; animation-delay: {{ min($loop->index * .03, .3) }}s;">
                        <td style="font-weight:600;">{{ $guest->name }}</td>
                        <td>
                            @if ($guest->category)
                                <span class="pill pill-neutral">{{ $guest->category }}</span>
                            @else
                                <span style="color:var(--muted-2);">—</span>
                            @endif
                        </td>
                        <td>
                            @if ($guest->visited_at)
                                <span class="pill pill-success" title="{{ $guest->visited_at->format('d M Y, H:i') }}">
                                    <span class="pill-dot" style="background: var(--success);"></span>
                                    Dikunjungi
                                </span>
                            @else
                                <span class="pill pill-neutral">
                                    <span class="pill-dot" style="background: var(--muted-2);"></span>
                                    Belum dibuka
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="link-row">
                                <code id="link-{{ $guest->id }}" class="link-chip">{{ $link }}</code>
                                <button type="button" class="copy-btn" onclick="copyLink({{ $guest->id }}, this)">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:12px;height:12px;"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
                                    Copy
                                </button>
                            </div>
                        </td>
                        <td style="text-align:right;">
                            <form method="POST" action="{{ route('admin.guests.destroy', $guest) }}" onsubmit="return confirm('Hapus tamu {{ $guest->name }}?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger-ghost btn-sm">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@if ($guests->hasPages())
    <div class="pagination-wrap">{{ $guests->links() }}</div>
@endif

<script>
function copyLink(id, btn) {
    const text = document.getElementById('link-' + id).textContent;
    navigator.clipboard.writeText(text).then(() => {
        const original = btn.innerHTML;
        btn.textContent = 'Copied!';
        btn.classList.add('copied');
        setTimeout(() => {
            btn.innerHTML = original;
            btn.classList.remove('copied');
        }, 1500);
    });
}
</script>
@endsection
