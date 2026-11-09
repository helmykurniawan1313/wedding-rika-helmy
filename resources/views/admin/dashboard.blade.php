@extends('admin.layout')

@section('title', 'Ucapan & Doa')

@section('content')
<div class="page-head">
    <div>
        <h1>Ucapan &amp; Doa</h1>
        <p>Semua pesan yang masuk dari tamu undangan</p>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card" style="animation-delay: .02s;">
        <div class="label">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            Total Tamu
        </div>
        <div class="value">{{ $stats['guests'] }}</div>
    </div>
    <div class="stat-card" style="animation-delay: .06s;">
        <div class="label">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
            Sudah Membuka Undangan
        </div>
        <div class="value">{{ $stats['visited'] }} <span class="of">/ {{ $stats['guests'] }}</span></div>
    </div>
    <div class="stat-card" style="animation-delay: .1s;">
        <div class="label">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3"/></svg>
            Ucapan Diterima
        </div>
        <div class="value">{{ $stats['remarks'] }}</div>
    </div>
</div>

<div class="card" style="overflow: hidden; animation-delay: .14s;">
    @if ($remarks->isEmpty())
        <div class="empty-state">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            </div>
            Belum ada ucapan yang masuk.
        </div>
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Ucapan</th>
                    <th style="white-space:nowrap;">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($remarks as $remark)
                    <tr style="animation: fadeUp .35s var(--ease) both; animation-delay: {{ min($loop->index * .03, .3) }}s;">
                        <td style="font-weight:600;">{{ $remark->name }}</td>
                        <td style="color:var(--muted);">{{ $remark->description ?? '—' }}</td>
                        <td style="max-width: 360px; color: #3f372e;">{{ $remark->remark }}</td>
                        <td style="color:var(--muted); white-space:nowrap;">{{ $remark->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
