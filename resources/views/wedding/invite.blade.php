<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Wedding of Helmy & Rika</title>

  <link rel="stylesheet" href="{{ asset('wedding/first/first.css') }}?v={{ filemtime(public_path('wedding/first/first.css')) }}">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&display=swap');
  </style>
</head>
<body>
  @include('partials.preloader')
  <div class="background">
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
    <div class="cloud cloud-3"></div>
    <div class="cloud cloud-4"></div>
    <div class="cloud cloud-5"></div>
    <div class="cloud cloud-6"></div>
    <div class="cloud cloud-7"></div>
  </div>
  
  <div class="image-hero">
    <div class="image-hero-container">
      <img class="hero-img-mobile" src="{{ $content->heroImageMobileUrl() }}" alt="Hero Image">
      <img class="hero-img-desktop" src="{{ $content->heroImageDesktopUrl() }}" alt="Hero Image">
      <div class="image-hero-border"></div>
    </div>
    
    <div class="image-hero-content-text">
      <h6 class="josefin-sans-regular">The Wedding of</h6>
      <h1 class="pacifico-regular">Helmy & Rika</h1>
      <h5 class="josefin-sans-regular">{{ $content->wedding_date }}</h5>

      <div class="invite-divider"></div>

      <p class="josefin-sans-regular">Kepada Yang Terhormat</p>

      <h4 class="josefin-sans-regular">{{ $user->name }}</h4>

      <a href="{{ url('/invited/' . $name) }}" style="text-decoration: none;">
        <button id="inviteButton" class="cta-button josefin-sans-regular">
          Buka Undangan
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
        </button>
      </a>

    </div>
  </div>

  <script src="{{ asset('wedding/first/first.js') }}"></script>

</body>
</html>