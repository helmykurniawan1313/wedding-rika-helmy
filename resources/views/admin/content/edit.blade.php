@extends('admin.layout')

@section('title', 'Konten')

@section('content')
<div class="page-head">
    <div>
        <h1>Konten Undangan</h1>
        <p>Ubah teks, tanggal, dan gambar yang tampil di halaman undangan</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.content.update') }}" enctype="multipart/form-data">
    @csrf

    {{-- Section 1: Hero --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4z"/></svg>
            </div>
            <div>
                <h2>1. Hero / Sampul</h2>
                <p>Nama mempelai, tanggal, dan foto sampul undangan</p>
            </div>
        </div>
        <div class="card-section-body">
            <div class="form-grid">
                <div class="field">
                    <label>Nama Mempelai Pria</label>
                    <input type="text" name="groom_name" value="{{ old('groom_name', $content->groom_name) }}" required>
                </div>
                <div class="field">
                    <label>Nama Mempelai Wanita</label>
                    <input type="text" name="bride_name" value="{{ old('bride_name', $content->bride_name) }}" required>
                </div>
                <div class="field field-full">
                    <label>Tanggal Pernikahan (teks bebas)</label>
                    <input type="text" name="wedding_date" value="{{ old('wedding_date', $content->wedding_date) }}" placeholder="Sabtu, 12 April 2025" required>
                </div>
                <div class="field">
                    <label>Foto Sampul (Mobile)</label>
                    @if ($content->heroImageMobileUrl())
                        <img src="{{ $content->heroImageMobileUrl() }}" class="photo-thumb" alt="">
                    @endif
                    <input type="file" name="hero_image_mobile" accept="image/*">
                    <span class="field-hint">Kosongkan jika tidak ingin mengganti.</span>
                </div>
                <div class="field">
                    <label>Foto Sampul (Desktop)</label>
                    @if ($content->heroImageDesktopUrl())
                        <img src="{{ $content->heroImageDesktopUrl() }}" class="photo-thumb" alt="">
                    @endif
                    <input type="file" name="hero_image_desktop" accept="image/*">
                    <span class="field-hint">Kosongkan jika tidak ingin mengganti.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 2: Intro --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg>
            </div>
            <div>
                <h2>2. Kata Pembuka</h2>
                <p>Teks sambutan di bawah sampul</p>
            </div>
        </div>
        <div class="card-section-body">
            <div class="field">
                <label>Teks Pembuka</label>
                <textarea name="intro_text" rows="4" required>{{ old('intro_text', $content->intro_text) }}</textarea>
            </div>
        </div>
    </div>

    {{-- Section 3: Couple --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
            </div>
            <div>
                <h2>3. Kedua Mempelai</h2>
                <p>Nama, orang tua, dan foto masing-masing mempelai</p>
            </div>
        </div>
        <div class="card-section-body">
            <div class="form-grid">
                <div class="field">
                    <label>Nama Lengkap Pria</label>
                    <input type="text" name="groom_name" value="{{ old('groom_name', $content->groom_name) }}" required>
                    <span class="field-hint">Sama dengan nama di bagian Hero.</span>
                </div>
                <div class="field">
                    <label>Nama Lengkap Wanita</label>
                    <input type="text" name="bride_name" value="{{ old('bride_name', $content->bride_name) }}" required>
                    <span class="field-hint">Sama dengan nama di bagian Hero.</span>
                </div>
                <div class="field">
                    <label>Orang Tua Pria</label>
                    <input type="text" name="groom_parents" value="{{ old('groom_parents', $content->groom_parents) }}" placeholder="Bapak ... &amp; Ibu ..." required>
                </div>
                <div class="field">
                    <label>Orang Tua Wanita</label>
                    <input type="text" name="bride_parents" value="{{ old('bride_parents', $content->bride_parents) }}" placeholder="Bapak ... &amp; Ibu ..." required>
                </div>
                <div class="field">
                    <label>Foto Mempelai Pria</label>
                    @if ($content->groomPhotoUrl())
                        <img src="{{ $content->groomPhotoUrl() }}" class="photo-thumb" alt="">
                    @endif
                    <input type="file" name="groom_photo" accept="image/*">
                </div>
                <div class="field">
                    <label>Foto Mempelai Wanita</label>
                    @if ($content->bridePhotoUrl())
                        <img src="{{ $content->bridePhotoUrl() }}" class="photo-thumb" alt="">
                    @endif
                    <input type="file" name="bride_photo" accept="image/*">
                </div>
            </div>
        </div>
    </div>

    {{-- Section 4: Event --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 2v4M8 2v4M3 9h18M5 5h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/></svg>
            </div>
            <div>
                <h2>4. Acara</h2>
                <p>Detail Akad Nikah, Resepsi, dan lokasi peta</p>
            </div>
        </div>
        <div class="card-section-body">
            <h3 style="font-size:.85rem; font-weight:700; color:var(--gold-dark); margin: 0 0 .75rem;">Akad Nikah</h3>
            <div class="form-grid" style="margin-bottom: 1.5rem;">
                <div class="field">
                    <label>Tanggal</label>
                    <input type="text" name="akad_date" value="{{ old('akad_date', $content->akad_date) }}" required>
                </div>
                <div class="field">
                    <label>Waktu</label>
                    <input type="text" name="akad_time" value="{{ old('akad_time', $content->akad_time) }}" required>
                </div>
                <div class="field">
                    <label>Label Tempat</label>
                    <input type="text" name="akad_venue_label" value="{{ old('akad_venue_label', $content->akad_venue_label) }}" required>
                </div>
                <div class="field">
                    <label>Alamat</label>
                    <input type="text" name="akad_address" value="{{ old('akad_address', $content->akad_address) }}" required>
                </div>
            </div>

            <h3 style="font-size:.85rem; font-weight:700; color:var(--gold-dark); margin: 0 0 .75rem;">Resepsi</h3>
            <div class="form-grid" style="margin-bottom: 1.5rem;">
                <div class="field">
                    <label>Tanggal</label>
                    <input type="text" name="resepsi_date" value="{{ old('resepsi_date', $content->resepsi_date) }}" required>
                </div>
                <div class="field">
                    <label>Waktu</label>
                    <input type="text" name="resepsi_time" value="{{ old('resepsi_time', $content->resepsi_time) }}" required>
                </div>
                <div class="field">
                    <label>Label Tempat</label>
                    <input type="text" name="resepsi_venue_label" value="{{ old('resepsi_venue_label', $content->resepsi_venue_label) }}" required>
                </div>
                <div class="field">
                    <label>Alamat</label>
                    <input type="text" name="resepsi_address" value="{{ old('resepsi_address', $content->resepsi_address) }}" required>
                </div>
            </div>

            <h3 style="font-size:.85rem; font-weight:700; color:var(--gold-dark); margin: 0 0 .75rem;">Peta</h3>
            <div class="form-grid">
                <div class="field field-full">
                    <label>URL Embed Google Maps</label>
                    <textarea name="maps_embed_url" rows="3">{{ old('maps_embed_url', $content->maps_embed_url) }}</textarea>
                    <span class="field-hint">Dari tombol "Share" &rarr; "Embed a map" di Google Maps, salin isi atribut src pada iframe.</span>
                </div>
                <div class="field field-full">
                    <label>Tautan Google Maps</label>
                    <input type="text" name="maps_link_url" value="{{ old('maps_link_url', $content->maps_link_url) }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Section 5: Ucapan (info only) --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            </div>
            <div>
                <h2>5. Ucapan &amp; Doa</h2>
                <p>Dikelola tamu lewat halaman undangan, bukan di sini</p>
            </div>
        </div>
        <div class="card-section-body">
            <p style="margin:0; font-size:.875rem; color: var(--muted);">
                Ucapan ditulis langsung oleh tamu di halaman undangan. Untuk melihat semua ucapan yang masuk, buka
                <a href="{{ route('admin.dashboard') }}" style="color: var(--gold-dark); font-weight:600;">halaman Ucapan</a>.
            </p>
        </div>
    </div>

    {{-- Section 8: Gift --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8M2 7h20v5H2zM12 22V7"/></svg>
            </div>
            <div>
                <h2>8. Hadiah Pernikahan</h2>
                <p>Nomor rekening dan alamat pengiriman hadiah</p>
            </div>
        </div>
        <div class="card-section-body">
            <div class="form-grid">
                <div class="field">
                    <label>Nama Bank</label>
                    <input type="text" name="bank_name" value="{{ old('bank_name', $content->bank_name) }}" required>
                </div>
                <div class="field">
                    <label>Nomor Rekening</label>
                    <input type="text" name="bank_account_number" value="{{ old('bank_account_number', $content->bank_account_number) }}" required>
                </div>
                <div class="field field-full">
                    <label>Atas Nama</label>
                    <input type="text" name="bank_account_owner" value="{{ old('bank_account_owner', $content->bank_account_owner) }}" required>
                </div>
                <div class="field field-full">
                    <label>Alamat Pengiriman Hadiah</label>
                    <input type="text" name="gift_address" value="{{ old('gift_address', $content->gift_address) }}" required>
                </div>
                <div class="field field-full">
                    <label>Penerima / Keterangan Alamat</label>
                    <input type="text" name="gift_address_owner" value="{{ old('gift_address_owner', $content->gift_address_owner) }}" required>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 9: Verse --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg>
            </div>
            <div>
                <h2>9. Ayat / Hadist</h2>
                <p>Kutipan ayat dan referensinya</p>
            </div>
        </div>
        <div class="card-section-body">
            <div class="field" style="margin-bottom: .75rem;">
                <label>Teks Ayat</label>
                <textarea name="verse_text" rows="4" required>{{ old('verse_text', $content->verse_text) }}</textarea>
            </div>
            <div class="field">
                <label>Referensi</label>
                <input type="text" name="verse_reference" value="{{ old('verse_reference', $content->verse_reference) }}" placeholder="Q.S. Ar-Rum: 21" required>
            </div>
        </div>
    </div>

    {{-- Section 10: Footer --}}
    <div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
        <div class="card-section-header">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-5.1-9.5-9.3C1 8.8 2.3 5.5 5.6 5c2-.3 3.6.7 4.4 2.1C10.8 5.7 12.4 4.7 14.4 5c3.3.5 4.6 3.8 3.1 6.7C15 15.9 12 21 12 21z"/></svg>
            </div>
            <div>
                <h2>10. Penutup</h2>
                <p>Salam penutup dan foto latar</p>
            </div>
        </div>
        <div class="card-section-body">
            <div class="form-grid">
                <div class="field field-full">
                    <label>Salam Penutup</label>
                    <input type="text" name="footer_greeting" value="{{ old('footer_greeting', $content->footer_greeting) }}" required>
                </div>
                <div class="field">
                    <label>Foto Latar Penutup</label>
                    @if ($content->footerBgImageUrl())
                        <img src="{{ $content->footerBgImageUrl() }}" class="photo-thumb" alt="">
                    @endif
                    <input type="file" name="footer_bg_image" accept="image/*">
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" style="margin-bottom: 2rem;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><path d="M17 21v-8H7v8M7 3v5h8"/></svg>
        Simpan Semua Perubahan
    </button>
</form>

{{-- Section 6: Timeline (repeating) --}}
<div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
    <div class="card-section-header">
        <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <div>
            <h2>6. Perjalanan Cinta</h2>
            <p>Tahun, judul, cerita, dan foto untuk setiap tahun</p>
        </div>
    </div>
    <div class="card-section-body">
        @foreach ($timelineEntries as $entry)
            <div class="repeat-item">
                <form method="POST" action="{{ route('admin.content.timeline.update', $entry) }}" enctype="multipart/form-data" class="repeat-fields">
                    @csrf
                    @method('PUT')
                    <div class="form-grid">
                        <div class="field">
                            <label>Tahun</label>
                            <input type="text" name="year" value="{{ $entry->year }}" required>
                        </div>
                        <div class="field">
                            <label>Judul</label>
                            <input type="text" name="title" value="{{ $entry->title }}" required>
                        </div>
                        <div class="field field-full">
                            <label>Cerita</label>
                            <textarea name="description" rows="3" required>{{ $entry->description }}</textarea>
                        </div>
                        <div class="field field-full">
                            <label>Foto</label>
                            @if ($entry->photoUrl())
                                <img src="{{ $entry->photoUrl() }}" class="photo-thumb" alt="">
                            @endif
                            <input type="file" name="photo" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-ghost btn-sm" style="margin-top:.75rem;">Simpan</button>
                </form>
                <form method="POST" action="{{ route('admin.content.timeline.destroy', $entry) }}" onsubmit="return confirm('Hapus tahun {{ $entry->year }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger-ghost btn-sm">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6"/></svg>
                        Hapus
                    </button>
                </form>
            </div>
        @endforeach

        <h3 style="font-size:.85rem; font-weight:700; color:var(--gold-dark); margin: 1.25rem 0 .75rem;">Tambah Tahun Baru</h3>
        <form method="POST" action="{{ route('admin.content.timeline.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="field">
                    <label>Tahun</label>
                    <input type="text" name="year" placeholder="2025" required>
                </div>
                <div class="field">
                    <label>Judul</label>
                    <input type="text" name="title" required>
                </div>
                <div class="field field-full">
                    <label>Cerita</label>
                    <textarea name="description" rows="3" required></textarea>
                </div>
                <div class="field field-full">
                    <label>Foto</label>
                    <input type="file" name="photo" accept="image/*">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:.75rem;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                Tambah Tahun
            </button>
        </form>
    </div>
</div>

{{-- Section 7: Gallery (repeating) --}}
<div class="card" style="margin-bottom: 1.25rem; overflow: hidden;">
    <div class="card-section-header">
        <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
        </div>
        <div>
            <h2>7. Galeri</h2>
            <p>Foto-foto yang tampil di bagian Gallery</p>
        </div>
    </div>
    <div class="card-section-body">
        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(110px, 1fr)); gap: .9rem; margin-bottom: 1.25rem;">
            @foreach ($galleryPhotos as $photo)
                <div style="text-align:center;">
                    <img src="{{ $photo->url() }}" class="photo-thumb" style="width:100%; height:90px; margin-bottom:.5rem;" alt="">
                    <form method="POST" action="{{ route('admin.content.gallery.destroy', $photo) }}" onsubmit="return confirm('Hapus foto ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger-ghost btn-sm" style="width:100%;">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>

        <form method="POST" action="{{ route('admin.content.gallery.store') }}" enctype="multipart/form-data" style="display:flex; gap:.75rem; align-items:flex-end; flex-wrap:wrap;">
            @csrf
            <div class="field" style="flex: 1 1 220px;">
                <label>Tambah Foto Galeri</label>
                <input type="file" name="photo" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                Tambah
            </button>
        </form>
    </div>
</div>

{{-- Hero carousel photos (repeating) --}}
<div class="card" style="margin-bottom: 2rem; overflow: hidden;">
    <div class="card-section-header">
        <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <div>
            <h2>Foto Carousel Hero (Halaman Undangan)</h2>
            <p>Foto yang berganti-ganti di bagian atas halaman undangan</p>
        </div>
    </div>
    <div class="card-section-body">
        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(110px, 1fr)); gap: .9rem; margin-bottom: 1.25rem;">
            @foreach ($heroCarouselPhotos as $photo)
                <div style="text-align:center;">
                    <img src="{{ $photo->url() }}" class="photo-thumb" style="width:100%; height:90px; margin-bottom:.5rem;" alt="">
                    <form method="POST" action="{{ route('admin.content.herocarousel.destroy', $photo) }}" onsubmit="return confirm('Hapus foto ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger-ghost btn-sm" style="width:100%;">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>

        <form method="POST" action="{{ route('admin.content.herocarousel.store') }}" enctype="multipart/form-data" style="display:flex; gap:.75rem; align-items:flex-end; flex-wrap:wrap;">
            @csrf
            <div class="field" style="flex: 1 1 220px;">
                <label>Tambah Foto Carousel</label>
                <input type="file" name="photo" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                Tambah
            </button>
        </form>
    </div>
</div>
@endsection
