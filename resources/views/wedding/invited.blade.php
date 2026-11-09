<!DOCTYPE html>
<html lang="en">

<head>
  <title>Helmy & Rika Wedding</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('wedding/second/css/vendor.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('wedding/second/style.css') }}">

  <link href="{{ asset('wedding/second/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('wedding/second/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('wedding/second/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('wedding/second/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  
  <link href="{{ asset('wedding/second/assets/css/main.css') }}" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

</head>

<body>
  @include('partials.preloader')

  <section id="hero" class="hero">

    <div class="info d-flex align-items-center hero-info-offset">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h4 data-aos="fade-down" class="date">{{ $content->wedding_date }}</h4>
            <h2 data-aos="fade-down" class="name mar-40">Helmy & Rika</h2>
            
            <p data-aos="fade-up" class="psmall">Untuk Yang Terhormat</p>
            <h4 data-aos="fade-up" class="nameinv"> {{ $user->name }}</h4>
            <p data-aos="fade-up" class="psmall">di tempat</p>

          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      @foreach ($heroCarouselPhotos as $i => $photo)
      <div class="carousel-item {{ $i === 0 ? 'active' : '' }}" style="background-image: url({{ $photo->url() }})"></div>
      @endforeach
    </div>

  </section><section class="intro-section">
    <div class="intro-card">
      <div class="intro-ornament" data-aos="fade-down">
        <span class="ornament-line"></span>
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4z"/></svg>
        <span class="ornament-line right"></span>
      </div>
      <span class="intro-eyebrow" data-aos="fade-down">Assalamualaikum wr. wb.</span>

      <p class="intro-text" data-aos="fade-up" data-aos-delay="100">{{ $content->intro_text }}</p>

      <div class="intro-divider" data-aos="fade-up" data-aos-delay="150"></div>

      <h3 class="intro-date" data-aos="fade-up" data-aos-delay="200">{{ $content->wedding_date }}</h3>
    </div>
  </section>

  <section class="couple-section overflow-hidden">
    <div class="container">
      <div class="couple-heading" data-aos="fade-down">
        <span class="couple-eyebrow">Kedua Mempelai</span>
        <div class="couple-divider"></div>
      </div>

      <div class="row align-items-center justify-content-center couple-row">
        <div class="col-md-4 col-sm-6" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <div class="couple-card">
            <div class="couple-photo">
              <img src="{{ $content->groomPhotoUrl() }}" alt="{{ $content->groom_name }}" class="img-fluid">
            </div>
            <h5 class="couple-name">{{ $content->groom_name }}</h5>
            <p class="couple-relation">Putra dari keluarga</p>
            <h6 class="couple-parents">{{ $content->groom_parents }}</h6>
          </div>
        </div>

        <div class="col-md-2 col-sm-12 couple-divider-col">
          <span class="couple-amp">&amp;</span>
        </div>

        <div class="col-md-4 col-sm-6" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <div class="couple-card">
            <div class="couple-photo">
              <img src="{{ $content->bridePhotoUrl() }}" alt="{{ $content->bride_name }}" class="img-fluid">
            </div>
            <h5 class="couple-name">{{ $content->bride_name }}</h5>
            <p class="couple-relation">Putri dari keluarga</p>
            <h6 class="couple-parents">{{ $content->bride_parents }}</h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="event-section">
    <div class="container">
      <div class="couple-heading" data-aos="fade-down">
        <span class="couple-eyebrow">Save The Date</span>
        <h3 class="event-title">Acara Pernikahan</h3>
        <div class="couple-divider"></div>
      </div>

      <div class="row justify-content-center event-row">
        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
          <div class="event-card">
            <div class="event-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M16 2v4M8 2v4M3 9h18M5 5h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/></svg>
            </div>
            <h3 class="event-name">Akad Nikah</h3>
            <p class="event-date">{{ $content->akad_date }}</p>
            <p class="event-time">{{ $content->akad_time }}</p>
            <div class="event-sep"></div>
            <p class="event-place">{{ $content->akad_venue_label }}</p>
            <p class="event-address">{{ $content->akad_address }}</p>
          </div>
        </div>

        <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
          <div class="event-card">
            <div class="event-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4z"/></svg>
            </div>
            <h3 class="event-name">Resepsi</h3>
            <p class="event-date">{{ $content->resepsi_date }}</p>
            <p class="event-time">{{ $content->resepsi_time }}</p>
            <div class="event-sep"></div>
            <p class="event-place">{{ $content->resepsi_venue_label }}</p>
            <p class="event-address">{{ $content->resepsi_address }}</p>
          </div>
        </div>
      </div>

      <div class="event-map-wrap" data-aos="fade-up" data-aos-delay="300">
        <div class="event-map">
          <iframe src="{{ $content->maps_embed_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <a href="{{ $content->maps_link_url }}" class="event-map-btn">
          Lihat Lokasi di Google Maps
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </section>

  <section class="testimonials-section">
    <style>
        .testimonials-section {
            padding: 60px 20px;
            background: linear-gradient(180deg, #0a1a2b 0%, #0d2338 100%);
            font-family: 'Josefin Sans', sans-serif;
            width: 100%;
            overflow: hidden;
        }

        .container-a { max-width: 720px; margin: 0 auto; }

        .container-a .section-header { text-align: center; margin-bottom: 32px; }
        .container-a .section-header h4 { font-size: 1.5rem; color: #f3e6c8; font-family: "Pacifico", cursive; font-weight: 400; margin-bottom: 1.25rem; }

        .open-remark-btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .75rem 1.75rem;
            background: transparent;
            border: 1px solid #c9a227;
            color: #c9a227;
            font-family: "Josefin Sans", sans-serif;
            font-size: .9rem;
            font-weight: 500;
            letter-spacing: .03em;
            border-radius: 50px;
            cursor: pointer;
            transition: background .25s ease, color .25s ease, transform .25s ease;
        }
        .open-remark-btn svg { width: 15px; height: 15px; }
        .open-remark-btn:hover { background: #c9a227; color: #0a1a2b; transform: translateY(-2px); }

        /* --- THE LOOPING SCROLLER --- */
        .testimonials-container {
            position: relative;
            height: 500px;
            overflow: hidden;
            /* Fade effect at top and bottom */
            mask-image: linear-gradient(to bottom, transparent 0%, black 10%, black 90%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, transparent 0%, black 10%, black 90%, transparent 100%);
        }

        .testimonial-track {
            display: flex;
            flex-direction: column;
            /* SPEED ADJUSTMENT:
               Lower number = Faster.
               Higher number = Slower.
            */
            animation: infiniteScrollUp 420s linear infinite;
        }

        /* Pause on hover so guests can read specific wishes */
        .testimonials-container:hover .testimonial-track {
            animation-play-state: paused;
        }

        .testimonial {
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 28px 25px 22px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            margin-bottom: 20px;
            border: 1px solid rgba(201, 162, 39, .2);
            backdrop-filter: blur(6px);
            transition: border-color .25s ease, transform .25s ease;
        }

        .testimonial:hover {
            border-color: rgba(201, 162, 39, .45);
            transform: translateY(-2px);
        }

        .testimonial::before {
            content: "\201C";
            position: absolute;
            top: 6px;
            left: 18px;
            font-family: Georgia, serif;
            font-size: 3.2rem;
            line-height: 1;
            color: #c9a227;
            opacity: .35;
        }

        .testimonial-content {
            position: relative;
            font-style: italic;
            color: #d7dde5;
            margin-bottom: 18px;
            padding-left: 6px;
            line-height: 1.7;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            padding-top: 14px;
            border-top: 1px solid rgba(201, 162, 39, .15);
        }

        .author-info h4 { margin: 0; font-size: 1rem; color: #f3e6c8; }
        .author-info p { margin: 0; font-size: 0.8rem; color: #93a1b3; text-align: left; letter-spacing: .02em; }

        /* --- THE ANIMATION --- */
        @keyframes infiniteScrollUp {
            from { transform: translateY(0); }
            to { transform: translateY(-50%); } /* We move exactly half the height of the doubled track */
        }

        /* Form Styles */
        .contact-form { background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); border: 1px solid rgba(201, 162, 39, .2); backdrop-filter: blur(6px); }
        .contact-form label { color: #f3e6c8; }
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 10px; border: 1px solid rgba(201, 162, 39, .3); border-radius: 5px; background: rgba(255,255,255,.06); color: #f3e6c8; }
        .form-control::placeholder { color: #93a1b3; }
        .form-control:focus { outline: none; border-color: #c9a227; background: rgba(255,255,255,.1); }
        .submit-btn { background: #c9a227; color: #0a1a2b; border: none; padding: 12px; width: 100%; border-radius: 5px; cursor: pointer; font-weight: 600; transition: background .2s ease; }
        .submit-btn:hover { background: #e0bb3a; }

        /* Remark modal */
        .remark-modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: rgba(5, 12, 22, .75);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .remark-modal-overlay.is-open { display: flex; }

        .remark-modal {
            position: relative;
            width: 100%;
            max-width: 460px;
            max-height: 90vh;
            overflow-y: auto;
            background: linear-gradient(180deg, #0d2338 0%, #0a1a2b 100%);
            border: 1px solid rgba(201, 162, 39, .3);
            border-radius: 16px;
            padding: 32px 24px 24px;
            box-shadow: 0 24px 60px -16px rgba(0,0,0,.5);
            animation: remarkModalIn .3s cubic-bezier(.22,1,.36,1);
        }

        @keyframes remarkModalIn {
            from { opacity: 0; transform: translateY(16px) scale(.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .remark-modal-title {
            font-family: "Pacifico", cursive;
            font-weight: 400;
            font-size: 1.4rem;
            color: #f3e6c8;
            text-align: center;
            margin-bottom: 1.25rem;
        }

        .remark-modal-close {
            position: absolute;
            top: 12px;
            right: 14px;
            background: transparent;
            border: none;
            color: #93a1b3;
            font-size: 1.6rem;
            line-height: 1;
            cursor: pointer;
            transition: color .2s ease;
        }
        .remark-modal-close:hover { color: #f3e6c8; }

        .remark-modal .contact-form {
            background: transparent;
            padding: 0;
            box-shadow: none;
            border: none;
            backdrop-filter: none;
        }

        body.remark-modal-active { overflow: hidden; }
    </style>

    <div class="container-a" data-aos="fade-down">
        <div class="section-header">
            <h4 class="doa">Ucapan, doa dan harapan teman - teman</h4>
            <button type="button" class="open-remark-btn" id="openRemarkBtn">
                Kirim Ucapan &amp; Doa
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
            </button>
        </div>

        <div class="testimonials-container">
            <div class="testimonial-track">

                @foreach ($remarks as $remar)
                <div class="testimonial">
                    <p class="testimonial-content">"{{ $remar->remark }}"</p>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h4>{{ $remar->name }}</h4>
                            <p>{{ $remar->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($remarks as $remar)
                <div class="testimonial">
                    <p class="testimonial-content">"{{ $remar->remark }}"</p>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h4>{{ $remar->name }}</h4>
                            <p>{{ $remar->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="remark-modal-overlay" id="remarkModalOverlay">
        <div class="remark-modal">
            <button type="button" class="remark-modal-close" id="closeRemarkBtn" aria-label="Tutup">&times;</button>
            <h4 class="remark-modal-title">Kirim Ucapan &amp; Doa</h4>
            <div class="contact-form">
                <form id="remarkForm">
                    @csrf
                    <div class="form-group">
                        <label class="fw-bold">Nama:</label>
                        <input type="text" class="form-control" name="nama" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label class="fw-bold">Keterangan:</label>
                        <input type="text" class="form-control" name="perusahaan" placeholder="Teman SMA, Rekan Kerja, dll">
                    </div>
                    <div class="form-group">
                        <label class="fw-bold">Doa & Ucapan:</label>
                        <textarea class="form-control" name="doa_pesan" rows="4"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Kirim Ucapan</button>
                </form>
                <div id="successMessage" class="alert alert-success mt-3" style="display:none;"></div>
            </div>
        </div>
    </div>
</section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#openRemarkBtn').on('click', function() {
        $('#remarkModalOverlay').addClass('is-open');
        $('body').addClass('remark-modal-active');
      });

      function closeRemarkModal() {
        $('#remarkModalOverlay').removeClass('is-open');
        $('body').removeClass('remark-modal-active');
      }

      $('#closeRemarkBtn').on('click', closeRemarkModal);

      $('#remarkModalOverlay').on('click', function(e) {
        if (e.target === this) closeRemarkModal();
      });

      $(document).on('keydown', function(e) {
        if (e.key === 'Escape') closeRemarkModal();
      });

      $('#remarkForm').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
          url: "{{ route('remarks.store') }}", // Use Laravel Route
          type: "POST",
          data: $(this).serialize(),
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            $('#successMessage').text(response.message).fadeIn();
            $('#remarkForm')[0].reset();
            setTimeout(function() {
              $('#successMessage').fadeOut();
              closeRemarkModal();
            }, 1500);

            // Optional: Reload page to see new comment or append it dynamically
          },
          error: function(xhr) {
            if (xhr.status === 422) {
              var errors = xhr.responseJSON.errors;
              alert('Validation Error: ' + Object.values(errors).join('\n'));
            } else {
              alert('An error occurred. Please try again.');
            }
          }
        });
      });
    });
  </script>

<section class="timeline-module">
    <style>
        .timeline-module {
            position: relative;
            width: 100%;
            min-height: 100vh;
            min-height: 100svh;
            padding: clamp(2rem, 6vw, 4rem) 0;
            background: #0a192f;
            color: white;
            display: flex !important;
            flex-direction: column;
            justify-content: center;
        }

        .timeline-heading {
            text-align: center;
            margin-bottom: clamp(1.5rem, 5vw, 2.5rem);
        }

        .timeline-eyebrow {
            display: inline-block;
            font-family: "Josefin Sans", sans-serif;
            text-transform: uppercase;
            letter-spacing: .25em;
            font-size: clamp(.8rem, 2vw, .95rem);
            color: #e8cf7a;
        }

        .timeline-title {
            font-family: "Pacifico", cursive;
            font-size: clamp(1.75rem, 4.5vw, 2.4rem);
            color: #f3e6c8;
            margin: .5rem 0 0;
        }

        /* --- Carousel viewport --- */
        .timeline-viewport {
            position: relative;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 0 clamp(8px, 4vw, 20px);
        }

        .timeline-track-wrap {
            width: 100%;
            overflow: hidden;
            border-radius: 18px;
        }

        .timeline-track {
            display: flex;
            width: 100%;
            transition: transform .6s cubic-bezier(.22,1,.36,1);
        }

        .year-slide {
            flex: 0 0 100%;
            width: 100%;
            position: relative;
            aspect-ratio: 4 / 5;
            max-height: min(560px, 65vh);
        }

        @media (min-width: 992px) {
            .timeline-viewport {
                max-width: 1200px;
            }

            .year-slide {
                aspect-ratio: 16 / 9;
                max-height: min(720px, 80vh);
            }
        }

        .year-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .year-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(10,25,47,.35) 0%, rgba(10,25,47,.65) 55%, rgba(10,25,47,.92) 100%);
        }

        .content-wrap {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 5;
            padding: clamp(24px, 6vw, 40px) clamp(20px, 5vw, 36px);
            text-align: center;
        }

        .year-label {
            display: block;
            font-family: "Pacifico", cursive;
            font-size: clamp(2.6rem, 7vw, 3.4rem);
            font-weight: 400;
            color: rgba(201, 162, 39, .55);
            line-height: 1;
            margin-bottom: 8px;
        }

        .year-title {
            font-family: "Josefin Sans", sans-serif;
            font-size: clamp(1.3rem, 3.6vw, 1.6rem);
            font-weight: 600;
            letter-spacing: .02em;
            margin-bottom: 12px;
            color: #f3e6c8;
        }

        .year-title::after {
            content: "";
            display: block;
            width: 44px;
            height: 1px;
            background: #c9a227;
            opacity: .7;
            margin: 12px auto 0;
        }

        .year-desc {
            font-family: "Josefin Sans", sans-serif;
            font-size: clamp(.85rem, 2.2vw, .98rem);
            line-height: 1.75;
            color: #c7d1de;
            font-style: italic;
            max-width: 460px;
            margin: 0 auto;
        }

        .timeline-dots {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: clamp(1.25rem, 4vw, 1.75rem);
        }

        .timeline-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(201, 162, 39, .3);
            cursor: pointer;
            transition: background .3s ease, transform .3s ease;
        }

        .timeline-dot.active {
            background: #c9a227;
            transform: scale(1.35);
        }
    </style>

    <div class="timeline-heading" data-aos="fade-down">
        <span class="timeline-eyebrow">Our Journey</span>
        <h3 class="timeline-title">Perjalanan Cinta Kami</h3>
    </div>

    <div class="timeline-viewport">
        <div class="timeline-track-wrap">
            <div class="timeline-track" id="timelineTrack">
                @foreach($timelineEntries as $index => $item)
                <div class="year-slide">
                    <div class="year-bg" style="background-image: url('{{ $item->photoUrl() }}')"></div>
                    <div class="year-overlay"></div>
                    <div class="content-wrap">
                        <span class="year-label">{{ $item->year }}</span>
                        <h2 class="year-title">{{ $item->title }}</h2>
                        <p class="year-desc">"{{ $item->description }}"</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="timeline-dots">
        @foreach($timelineEntries as $index => $item)
        <span class="timeline-dot {{ $index === 0 ? 'active' : '' }}" data-idx="{{ $index }}"></span>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('timelineTrack');
            const slides = track.querySelectorAll('.year-slide');
            const dots = document.querySelectorAll('.timeline-dot');
            const total = slides.length;
            let currentIdx = 0;

            const goTo = (newIdx) => {
                if (newIdx < 0 || newIdx >= total) return;

                currentIdx = newIdx;
                track.style.transform = `translateX(-${currentIdx * 100}%)`;

                dots.forEach((dot, idx) => dot.classList.toggle('active', idx === currentIdx));
            };

            dots.forEach((dot, idx) => {
                dot.addEventListener('click', () => goTo(idx));
            });

            // Touch swipe support
            let touchStartX = 0;
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, { passive: true });

            track.addEventListener('touchend', (e) => {
                const touchEndX = e.changedTouches[0].clientX;
                const diff = touchStartX - touchEndX;
                const threshold = 40;

                if (Math.abs(diff) < threshold) return;

                if (diff > 0) {
                    goTo(currentIdx + 1);
                } else {
                    goTo(currentIdx - 1);
                }
            }, { passive: true });

            goTo(0);
        });
    </script>
</section>


  <section class="gallery-section position-relative">
    <style>
        .gallery-section {
            padding: clamp(2.5rem, 7vw, 5rem) clamp(1rem, 5vw, 2rem);
            background: linear-gradient(180deg, #fffaf3 0%, #fdf6ea 100%);
            width: 100%;
        }

        .gallery-heading {
            text-align: center;
            margin-bottom: clamp(1.75rem, 5vw, 2.5rem);
        }

        .gallery-eyebrow {
            display: inline-block;
            font-family: "Josefin Sans", sans-serif;
            text-transform: uppercase;
            letter-spacing: .25em;
            font-size: clamp(.8rem, 2vw, .95rem);
            color: #8b5a2b;
        }

        .gallery-title {
            font-family: "Pacifico", cursive;
            font-size: clamp(1.75rem, 4.5vw, 2.4rem);
            color: #2b2b2b;
            margin: .5rem 0 0;
        }

        .gallery-divider {
            width: 64px;
            height: 2px;
            background: #c9a227;
            border-radius: 2px;
            margin: .9rem auto 0;
            opacity: .8;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: clamp(8px, 2vw, 14px);
            max-width: 1000px;
            margin: 0 auto;
        }

        @media (min-width: 576px) {
            .gallery-grid { grid-template-columns: repeat(3, 1fr); }
        }

        @media (min-width: 992px) {
            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
                max-width: 1200px;
                gap: 20px;
            }
        }

        .gallery-item {
            position: relative;
            aspect-ratio: 3 / 4;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 24px -10px rgba(139, 90, 43, .3);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .5s cubic-bezier(.22,1,.36,1);
        }

        .gallery-item::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 60%, rgba(10,25,47,.45) 100%);
            opacity: 0;
            transition: opacity .4s ease;
        }

        .gallery-item:hover img { transform: scale(1.08); }
        .gallery-item:hover::after { opacity: 1; }
    </style>

    <div class="gallery-heading" data-aos="fade-down">
        <span class="gallery-eyebrow">Moments</span>
        <h3 class="gallery-title">Gallery</h3>
        <div class="gallery-divider"></div>
    </div>

    <div class="gallery-grid">
      @foreach ($galleryPhotos as $i => $photo)
      <div class="gallery-item" data-aos="zoom-in" data-aos-delay="{{ $i * 60 }}">
        <img src="{{ $photo->url() }}" alt="Gallery">
      </div>
      @endforeach
    </div>
  </section>

  <section class="gift-section position-relative" id="giftSection">
    <style>
        .gift-section {
            padding: clamp(2.5rem, 7vw, 5rem) clamp(1rem, 5vw, 2rem);
            background: #fdf6ea;
            width: 100%;
        }

        @media (prefers-reduced-motion: reduce) {
            .gift-section { transition: none; }
        }

        .gift-card {
            max-width: 480px;
            margin: 0 auto;
            padding: clamp(2rem, 6vw, 2.75rem);
            text-align: center;
            background: #0a192f;
            border-radius: 20px;
            box-shadow: 0 24px 60px -16px rgba(0, 0, 0, .4);
        }

        @media (min-width: 992px) {
            .gift-card {
                max-width: 680px;
                padding: 4rem 4.5rem;
            }

            .gift-card-icon {
                width: 68px;
                height: 68px;
            }

            .gift-card-icon svg {
                width: 34px;
                height: 34px;
            }

            .gift-card-label {
                font-size: .95rem;
            }

            .gift-card-heading {
                font-size: 2.5rem;
            }

            .gift-card-text {
                font-size: 1.15rem;
                line-height: 1.9;
            }
        }

        .gift-card-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(201, 162, 39, .14);
            color: #e8cf7a;
        }

        .gift-card-icon svg { width: 26px; height: 26px; }

        .gift-card-label {
            display: block;
            font-family: "Josefin Sans", sans-serif;
            font-size: .8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .15em;
            color: #e8cf7a;
            margin-bottom: .6rem;
        }

        .gift-card-heading {
            font-family: "Pacifico", cursive;
            font-size: clamp(1.6rem, 4vw, 2rem);
            color: #f3e6c8;
            margin-bottom: 1rem;
        }

        .gift-card-text {
            font-family: "Josefin Sans", sans-serif;
            font-size: .95rem;
            line-height: 1.8;
            color: #c7d1de;
            margin-bottom: 1.5rem;
        }

        .gift-toggle {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .8rem 1.75rem;
            background: #c9a227;
            color: #0a1a2b;
            border: none;
            font-family: "Josefin Sans", sans-serif;
            font-weight: 600;
            font-size: .95rem;
            letter-spacing: .02em;
            border-radius: 50px;
            cursor: pointer;
            transition: transform .25s cubic-bezier(.22,1,.36,1), box-shadow .25s ease, background .25s ease;
            box-shadow: 0 10px 24px -8px rgba(0, 0, 0, .4);
        }

        .gift-toggle svg {
            width: 16px;
            height: 16px;
            transition: transform .3s ease;
        }

        .gift-toggle:hover {
            background: #e0bb3a;
            transform: translateY(-3px);
            box-shadow: 0 14px 28px -8px rgba(0, 0, 0, .5);
        }

        /* Bank info modal */
        .gift-modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: rgba(10, 25, 47, .6);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .gift-modal-overlay.is-open { display: flex; }

        .gift-modal {
            position: relative;
            width: 100%;
            max-width: 420px;
            background: linear-gradient(180deg, #0d2338 0%, #0a1a2b 100%);
            border: 1px solid rgba(201, 162, 39, .3);
            border-radius: 20px;
            padding: clamp(2rem, 6vw, 2.5rem) clamp(1.5rem, 5vw, 2rem) clamp(1.75rem, 5vw, 2.25rem);
            text-align: center;
            box-shadow: 0 24px 60px -16px rgba(0, 0, 0, .5);
            animation: giftModalIn .3s cubic-bezier(.22,1,.36,1);
        }

        @keyframes giftModalIn {
            from { opacity: 0; transform: translateY(16px) scale(.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .gift-modal-title {
            font-family: "Pacifico", cursive;
            font-size: 1.4rem;
            color: #f3e6c8;
            margin-bottom: 1.25rem;
        }

        .gift-modal-close {
            position: absolute;
            top: 12px;
            right: 14px;
            background: transparent;
            border: none;
            color: #93a1b3;
            font-size: 1.6rem;
            line-height: 1;
            cursor: pointer;
            transition: color .2s ease;
        }
        .gift-modal-close:hover { color: #f3e6c8; }

        .gift-section-label {
            display: block;
            text-align: left;
            font-family: "Josefin Sans", sans-serif;
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: #e8cf7a;
        }

        .bank-account-card {
            margin-top: .6rem;
            margin-bottom: 1.25rem;
            padding: clamp(1.1rem, 4vw, 1.4rem);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(201, 162, 39, .25);
            border-radius: 14px;
            text-align: left;
        }

        .bank-name {
            font-family: "Josefin Sans", sans-serif;
            font-weight: 700;
            font-size: .85rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #e8cf7a;
        }

        .bank-number-row {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-top: .6rem;
        }

        .bank-number-row:has(.bank-address) {
            align-items: flex-start;
        }

        .bank-number {
            font-family: "Josefin Sans", sans-serif;
            font-size: clamp(1.1rem, 3.4vw, 1.3rem);
            font-weight: 600;
            color: #f3e6c8;
            letter-spacing: .03em;
        }

        .bank-address {
            font-family: "Josefin Sans", sans-serif;
            font-size: .9rem;
            line-height: 1.6;
            color: #f3e6c8;
            flex: 1;
        }

        .bank-copy-btn {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .4rem .9rem;
            background: transparent;
            border: 1px solid rgba(201, 162, 39, .4);
            color: #e8cf7a;
            font-family: "Josefin Sans", sans-serif;
            font-size: .8rem;
            font-weight: 500;
            border-radius: 50px;
            cursor: pointer;
            transition: background .2s ease, color .2s ease;
            white-space: nowrap;
        }

        .bank-copy-btn svg { width: 13px; height: 13px; }

        .bank-copy-btn:hover {
            background: #c9a227;
            color: #0a1a2b;
            border-color: #c9a227;
        }

        .bank-copy-btn.is-copied {
            background: #4a9d6e;
            color: #fff;
            border-color: #4a9d6e;
        }

        .bank-owner {
            font-family: "Josefin Sans", sans-serif;
            font-size: .85rem;
            color: #93a1b3;
            margin-top: .4rem;
        }

        body.gift-modal-active { overflow: hidden; }
    </style>

    <div class="gift-card">
        <div class="gift-card-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8M2 7h20v5H2zM12 22V7M12 7C9.79 7 8 5.21 8 3a2.5 2.5 0 0 1 5 0c0 1.1-.4 2.1-1 3M12 7c2.21 0 4-1.79 4-4a2.5 2.5 0 0 0-5 0c0 1.1.4 2.1 1 3"/></svg>
        </div>
        <span class="gift-card-label">Wedding Gift</span>
        <h3 class="gift-card-heading">Hadiah Pernikahan</h3>
        <p class="gift-card-text">Kehadiran serta doa restu Anda adalah hadiah yang paling berarti bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat mengirimkan hadiah secara digital melalui kartu berikut.</p>

        <button type="button" class="gift-toggle" id="giftToggleBtn" aria-haspopup="dialog" aria-controls="bankModal">
            <span>Kirim Hadiah</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
        </button>
    </div>

    <div class="gift-modal-overlay" id="bankModalOverlay">
        <div class="gift-modal" id="bankModal" role="dialog" aria-modal="true" aria-label="Kirim Hadiah">
            <button type="button" class="gift-modal-close" id="closeBankModalBtn" aria-label="Tutup">&times;</button>
            <div class="gift-card-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8M2 7h20v5H2zM12 22V7M12 7C9.79 7 8 5.21 8 3a2.5 2.5 0 0 1 5 0c0 1.1-.4 2.1-1 3M12 7c2.21 0 4-1.79 4-4a2.5 2.5 0 0 0-5 0c0 1.1.4 2.1 1 3"/></svg>
            </div>
            <h4 class="gift-modal-title">Kirim Hadiah</h4>

            <span class="gift-section-label">Transfer Bank</span>
            <div class="bank-account-card">
                <span class="bank-name">{{ $content->bank_name }}</span>
                <div class="bank-number-row">
                    <span class="bank-number" id="accountNumber1">{{ $content->bank_account_number }}</span>
                    <button type="button" class="bank-copy-btn copy-btn" data-target="accountNumber1">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        <span class="copy-label">Salin</span>
                    </button>
                </div>
                <p class="bank-owner">{{ $content->bank_account_owner }}</p>
            </div>

            <span class="gift-section-label">Kirim Hadiah ke Alamat</span>
            <div class="bank-account-card">
                <div class="bank-number-row">
                    <span class="bank-address" id="giftAddress">{{ $content->gift_address }}</span>
                    <button type="button" class="bank-copy-btn copy-btn" data-target="giftAddress">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        <span class="copy-label">Salin</span>
                    </button>
                </div>
                <p class="bank-owner">{{ $content->gift_address_owner }}</p>
            </div>
        </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const giftToggleBtn = document.getElementById('giftToggleBtn');
      const bankModalOverlay = document.getElementById('bankModalOverlay');
      const closeBankModalBtn = document.getElementById('closeBankModalBtn');

      function openBankModal() {
        bankModalOverlay.classList.add('is-open');
        document.body.classList.add('gift-modal-active');
      }

      function closeBankModal() {
        bankModalOverlay.classList.remove('is-open');
        document.body.classList.remove('gift-modal-active');
      }

      if (giftToggleBtn && bankModalOverlay) {
        giftToggleBtn.addEventListener('click', openBankModal);
        closeBankModalBtn.addEventListener('click', closeBankModal);

        bankModalOverlay.addEventListener('click', function(e) {
          if (e.target === bankModalOverlay) closeBankModal();
        });

        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') closeBankModal();
        });
      }

      document.querySelectorAll('.copy-btn').forEach(button => {
        button.addEventListener('click', function() {
          const targetId = this.getAttribute('data-target');
          const textToCopy = document.getElementById(targetId).textContent;
          const label = this.querySelector('.copy-label');
          navigator.clipboard.writeText(textToCopy.trim()).then(() => {
            const originalLabel = label ? label.textContent : null;
            if (label) label.textContent = 'Tersalin!';
            this.classList.add('is-copied');
            setTimeout(() => {
              if (label && originalLabel) label.textContent = originalLabel;
              this.classList.remove('is-copied');
            }, 2000);
          });
        });
      });

      // As the gift section scrolls through view, smoothly fade its
      // background from the cream tone (matching the gallery above) to the
      // card's navy, so the two colours blend into one by the time the
      // card is centred on screen.
      const giftSection = document.getElementById('giftSection');
      const giftCard = document.querySelector('.gift-card');
      if (giftSection) {
        const fromColor = [253, 246, 234]; // #fdf6ea (matches gallery section's end color)
        const toColor = [10, 25, 47];      // #0a192f
        let ticking = false;

        const progress = () => {
          const vh = window.innerHeight;
          const rect = giftSection.getBoundingClientRect();
          // 0 when the section's top reaches the middle of the screen,
          // 1 when the section's top reaches the top of the screen.
          const raw = (vh * 0.5 - rect.top) / (vh * 0.5);
          return Math.min(1, Math.max(0, raw));
        };

        const paint = () => {
          const p = progress();
          const r = Math.round(fromColor[0] + (toColor[0] - fromColor[0]) * p);
          const g = Math.round(fromColor[1] + (toColor[1] - fromColor[1]) * p);
          const b = Math.round(fromColor[2] + (toColor[2] - fromColor[2]) * p);
          giftSection.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;

          // As the background catches up to the card's own navy, fade out
          // the shadow so the card visually dissolves into the backdrop.
          if (giftCard) {
            giftCard.style.boxShadow = `0 24px 60px -16px rgba(0, 0, 0, ${(0.4 * (1 - p)).toFixed(3)})`;
          }
          ticking = false;
        };

        paint();

        const kick = () => {
          if (!ticking) {
            ticking = true;
            requestAnimationFrame(paint);
          }
        };

        window.addEventListener('scroll', kick, { passive: true });
        window.addEventListener('resize', kick, { passive: true });
      }
    });
  </script>
<section class="verse-section">
  <style>
    .verse-section {
      position: relative;
      padding: clamp(3rem, 8vw, 5.5rem) clamp(1.25rem, 5vw, 2rem);
      background: #0a192f;
      text-align: center;
      overflow: hidden;
    }

    /* Decorative crescent moon — a soft, gently glowing night-sky accent
       tucked in the corner, made from two overlapping circles (a filled
       disc minus an offset "bite" via a radial mask-like second circle
       in the background colour) with a subtle pulsing glow halo. */
    .crescent-moon {
      position: absolute;
      top: clamp(1.5rem, 6vw, 3rem);
      right: clamp(1.25rem, 6vw, 4rem);
      width: clamp(56px, 12vw, 96px);
      height: clamp(56px, 12vw, 96px);
      border-radius: 50%;
      background: radial-gradient(circle at 35% 35%, #fdf6e0 0%, #f3e6c8 55%, #e8cf7a 100%);
      box-shadow: 0 0 40px 6px rgba(201, 162, 39, .25);
      z-index: 1;
      pointer-events: none;
      animation: moonGlow 6s ease-in-out infinite;
    }

    .crescent-moon::after {
      content: "";
      position: absolute;
      top: -8%;
      left: -22%;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: #0a192f;
    }

    @keyframes moonGlow {
      0%, 100% { box-shadow: 0 0 36px 4px rgba(201, 162, 39, .2); }
      50% { box-shadow: 0 0 52px 10px rgba(201, 162, 39, .32); }
    }

    @media (prefers-reduced-motion: reduce) {
      .crescent-moon { animation: none; }
    }

    /* Twinkling stars — small gold-cream dots scattered across the
       night-sky backdrop, each fading in and out on its own cycle for a
       natural, non-uniform shimmer. */
    .star {
      position: absolute;
      width: 3px;
      height: 3px;
      border-radius: 50%;
      background: #f3e6c8;
      box-shadow: 0 0 6px 1px rgba(243, 230, 200, .6);
      z-index: 1;
      pointer-events: none;
      opacity: 0;
      animation: starTwinkle ease-in-out infinite;
    }

    .star-1 { top: 10%; left: 8%;  width: 2px; height: 2px; animation-duration: 3.2s; animation-delay: 0s; }
    .star-2 { top: 18%; left: 22%; width: 3px; height: 3px; animation-duration: 4.1s; animation-delay: .6s; }
    .star-3 { top: 6%;  left: 40%; width: 2px; height: 2px; animation-duration: 2.8s; animation-delay: 1.2s; }
    .star-4 { top: 28%; left: 65%; width: 3px; height: 3px; animation-duration: 3.6s; animation-delay: .3s; }
    .star-5 { top: 14%; left: 85%; width: 2px; height: 2px; animation-duration: 4.4s; animation-delay: 1.8s; }
    .star-6 { top: 34%; left: 12%; width: 2px; height: 2px; animation-duration: 3.9s; animation-delay: 2.1s; }
    .star-7 { top: 24%; left: 48%; width: 3px; height: 3px; animation-duration: 3.1s; animation-delay: .9s; }
    .star-8 { top: 8%;  left: 58%; width: 2px; height: 2px; animation-duration: 4.7s; animation-delay: 1.5s; }

    @keyframes starTwinkle {
      0%, 100% { opacity: 0; transform: scale(.7); }
      50% { opacity: 1; transform: scale(1); }
    }

    @media (prefers-reduced-motion: reduce) {
      .star { animation: none; opacity: .6; }
    }

    .verse-ornament {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: .75rem;
      margin-bottom: clamp(1.5rem, 5vw, 2.25rem);
      color: #c9a227;
    }

    .verse-ornament svg {
      width: 26px;
      height: 26px;
    }

    .verse-ornament .ornament-line {
      width: clamp(36px, 8vw, 64px);
      height: 1px;
      background: linear-gradient(90deg, transparent, #c9a227);
    }

    .verse-ornament .ornament-line.right {
      background: linear-gradient(90deg, #c9a227, transparent);
    }

    .verse-text {
      max-width: 760px;
      margin: 0 auto;
      font-family: "Josefin Sans", sans-serif;
      font-style: italic;
      font-size: clamp(1.05rem, 2.6vw, 1.35rem);
      line-height: 1.95;
      color: #f3e6c8;
    }

    .verse-reference {
      display: block;
      margin-top: clamp(1.25rem, 4vw, 1.75rem);
      font-family: "Pacifico", cursive;
      font-style: normal;
      font-size: clamp(1.1rem, 2.6vw, 1.3rem);
      color: #c9a227;
    }
  </style>

  <span class="crescent-moon" aria-hidden="true"></span>

  <span class="star star-1" aria-hidden="true"></span>
  <span class="star star-2" aria-hidden="true"></span>
  <span class="star star-3" aria-hidden="true"></span>
  <span class="star star-4" aria-hidden="true"></span>
  <span class="star star-5" aria-hidden="true"></span>
  <span class="star star-6" aria-hidden="true"></span>
  <span class="star star-7" aria-hidden="true"></span>
  <span class="star star-8" aria-hidden="true"></span>

  <div class="container">
    <div class="verse-ornament" data-aos="fade-in" data-aos-delay="100">
      <span class="ornament-line"></span>
      <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4z"/></svg>
      <span class="ornament-line right"></span>
    </div>

    <p class="verse-text" data-aos="fade-in" data-aos-delay="200">
      &ldquo;{{ $content->verse_text }}&rdquo;
      <span class="verse-reference">{{ $content->verse_reference }}</span>
    </p>
  </div>
</section>

  <section id="foot" class="foot">
    <style>
      .foot {
        position: relative;
        min-height: 100vh;
        min-height: 100svh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: clamp(3rem, 8vw, 5rem) clamp(1.25rem, 5vw, 2rem);
        background: #0a192f;
        text-align: center;
        overflow: hidden;
      }

      .foot-bg {
        position: absolute;
        inset: 0;
        background-image: url('{{ $content->footerBgImageUrl() }}');
        background-size: cover;
        background-position: center 25%;
        opacity: .32;
        z-index: 0;
      }

      .foot-bg::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10,25,47,.75) 0%, rgba(10,25,47,.92) 70%, #0a192f 100%);
      }

      .foot-content {
        position: relative;
        z-index: 1;
        max-width: 480px;
        margin: 0 auto;
      }

      .foot-ornament {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .6rem;
        margin-bottom: clamp(1.25rem, 4vw, 1.75rem);
        color: #c9a227;
      }

      .foot-ornament svg {
        width: 20px;
        height: 20px;
      }

      .foot-ornament .ornament-line {
        width: clamp(28px, 6vw, 48px);
        height: 1px;
        background: linear-gradient(90deg, transparent, #c9a227);
      }

      .foot-ornament .ornament-line.right {
        background: linear-gradient(90deg, #c9a227, transparent);
      }

      .foot-thanks {
        font-family: "Pacifico", cursive;
        font-size: clamp(2.4rem, 7vw, 3.2rem);
        color: #f3e6c8;
        margin-bottom: clamp(.75rem, 3vw, 1.1rem);
      }

      .foot-greeting {
        font-family: "Josefin Sans", sans-serif;
        font-weight: 500;
        letter-spacing: .04em;
        font-size: clamp(1rem, 2.6vw, 1.2rem);
        color: #c7d1de;
        margin-bottom: clamp(1.5rem, 5vw, 2.25rem);
      }

      .foot-names {
        font-family: "Pacifico", cursive;
        font-size: clamp(1.6rem, 4.5vw, 2.1rem);
        color: #c9a227;
      }
    </style>

    <div class="foot-bg" aria-hidden="true"></div>

    <div class="foot-content">
      <div class="foot-ornament" data-aos="fade-in">
        <span class="ornament-line"></span>
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 21s-7-5.1-9.5-9.3C1 8.8 2.3 5.5 5.6 5c2-.3 3.6.7 4.4 2.1C10.8 5.7 12.4 4.7 14.4 5c3.3.5 4.6 3.8 3.1 6.7C15 15.9 12 21 12 21z"/></svg>
        <span class="ornament-line right"></span>
      </div>

      <h2 class="foot-thanks" data-aos="fade-up">Terima Kasih</h2>
      <p class="foot-greeting" data-aos="fade-up" data-aos-delay="100">{{ $content->footer_greeting }}</p>
      <p class="foot-names" data-aos="fade-up" data-aos-delay="200">{{ $content->groom_name }} &amp; {{ $content->bride_name }}</p>
    </div>
  </section>

  <script src="{{ asset('wedding/second/js/jquery.min.js') }}"></script>
  <script src="{{ asset('wedding/second/js/plugins.js') }}"></script>
  <script src="{{ asset('wedding/second/js/SmoothScroll.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="{{ asset('wedding/second/js/script.min.js') }}"></script>
</body>
</html>