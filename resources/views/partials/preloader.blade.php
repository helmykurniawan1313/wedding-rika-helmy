<div id="preloader">
    <div class="loader-content">
        <span class="monogram">H<span class="amp">&amp;</span>R</span>
        <span class="loader-rule"></span>
    </div>
</div>

<style>
    #preloader {
        position: fixed;
        inset: 0;
        background-color: #0a192f;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity .5s ease, visibility .5s ease;
    }
    #preloader.is-hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }
    .loader-content {
        text-align: center;
    }
    .monogram {
        display: inline-flex;
        align-items: baseline;
        gap: .35rem;
        font-family: 'Josefin Sans', system-ui, sans-serif;
        font-weight: 300;
        font-size: 2.6rem;
        letter-spacing: .08em;
        color: #e6f1ff;
        opacity: 0;
        transform: translateY(6px) scale(.97);
        animation: monogramIn 1s cubic-bezier(.22,1,.36,1) .1s forwards,
                   monogramGlow 2.4s ease-in-out 1.1s infinite;
    }
    .monogram .amp {
        color: #64ffda;
        font-family: 'Pacifico', cursive;
        font-size: 1.5rem;
        font-weight: 400;
    }
    .loader-rule {
        display: block;
        width: 0;
        height: 1px;
        margin: .85rem auto 0;
        background: #64ffda;
        opacity: .7;
        animation: loaderRule 1.1s cubic-bezier(.22,1,.36,1) .4s forwards;
    }
    @keyframes monogramIn {
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    @keyframes monogramGlow {
        0%, 100% { text-shadow: 0 0 0 rgba(100,255,218,0); }
        50% { text-shadow: 0 0 18px rgba(100,255,218,.35); }
    }
    @keyframes loaderRule {
        to { width: 64px; }
    }
    @media (prefers-reduced-motion: reduce) {
        .monogram, .loader-rule { animation: none; opacity: 1; width: 64px; }
    }
</style>

<script>
    (function () {
        function hidePreloader() {
            var el = document.getElementById('preloader');
            if (!el) return;
            el.classList.add('is-hidden');
            setTimeout(function () { el.remove(); }, 550);
        }
        if (document.readyState === 'complete') {
            hidePreloader();
        } else {
            window.addEventListener('load', hidePreloader);
        }
        // Safety net: never let the preloader block the page longer than this.
        setTimeout(hidePreloader, 2500);
    })();
</script>
