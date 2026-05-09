{{--
    Section 01 — Hero (v3, photo + parallax)
    Wireframe ref: §01. Cinematic photo bg with parallax (data-hero-parallax → JS in app.js).
    MVP photo: Picsum seeded URL. Replace with real photo/aftermovie video when delivered.
--}}
<section class="relative isolate flex items-end overflow-hidden bg-noir text-ivory min-h-[780px] md:min-h-[820px] lg:min-h-[900px]">

    {{-- ============================== BG LAYER ============================== --}}
    <div aria-hidden="true" class="absolute inset-0">
        <img
            src="{{ get_theme_file_uri('resources/images/hero.webp') }}"
            alt=""
            class="h-full w-full object-cover object-center"
            loading="eager"
            decoding="async" />
    </div>

    {{-- Overlays (NOT parallax — stay in place) --}}
    <div aria-hidden="true" class="absolute inset-0 bg-noir/55"></div>
    <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_75%_25%,rgba(201,169,97,0.20),transparent_60%)]"></div>
    <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-noir via-noir/55 to-transparent"></div>
    <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(ellipse_120%_120%_at_50%_50%,transparent_55%,rgba(10,10,10,0.55)_100%)]"></div>

    {{-- ============================== CONTENT ============================== --}}
    <div class="container-glam relative z-10 pb-14 pt-32 md:pb-20 md:pt-40 lg:pb-24 lg:pt-48">
        <div class="max-w-2xl">

            <span class="mb-5 inline-block font-sans text-eyebrow uppercase tracking-[0.28em] text-champagne">
                Wedding Masters
            </span>

            <h1 class="mb-6 font-serif text-h1 font-semibold leading-[1.1] text-ivory md:text-display md:leading-[1.05]">
                Cieszcie się swoim weselem.<br>
                Parkiet ogarniamy my.
            </h1>

            <p class="mb-9 max-w-xl font-sans text-lead text-ivory/80">
                Dwóch DJ-ów grających razem albo osobno. Jeden gra, drugi prowadzi z akordeonem.
                Plan wesela ustalamy z Wami, resztą zajmujemy się my.
            </p>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:gap-4">
                <x-button href="#kontakt" variant="dark" class="w-full sm:w-auto">
                    Porozmawiajmy o Waszym weselu
                </x-button>
                <x-button href="#galeria" variant="outline" tone="light" class="w-full sm:w-auto">
                    <span>Zobacz jak gramy</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="-mr-1 transition-transform duration-300 ease-glam group-hover:translate-x-1" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </x-button>
            </div>
        </div>
    </div>
</section>
