{{--
    Section 08 — O nas / Stoimy za tym razem
    Layout: 2-col split (lg+) — photo left + content right.
    Copy from wireframe §08 (lines 917-931). Spotify embed under text per user.
    Proportions: photo height stretches to match (text + Spotify) on lg+ (DS-014).
    MVP: photo is dark bokeh placeholder until real duo photo arrives — swap the bg block for an <img>.
    [Imię] tokens are intentional — replace with the duo's real names before launch.
--}}
@php
    // Placeholder Spotify-curated "Today's Top Hits" — stable global playlist, always available.
    // Replace with the duo's actual playlist ID once provided.
    $playlistId = '37i9dQZF1DXcBWIGoYBM5M';

    // Moodboard placeholder — ten sam język wizualny co <x-offer-card accent="gold">.
    // Podmień na <img> z ACF, kiedy realne zdjęcie duetu trafi do CMS.
    $moodboardStyle =
        'background:'
        .' radial-gradient(ellipse 70% 60% at 70% 25%, rgba(201,169,97,0.45), transparent 60%),'
        .' radial-gradient(ellipse 50% 45% at 25% 75%, rgba(168,139,63,0.35), transparent 55%),'
        .' radial-gradient(ellipse 30% 30% at 50% 45%, rgba(255,225,165,0.20), transparent 60%),'
        .' #0A0A0A;';
@endphp

<section id="o-nas" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- items-stretch (grid default) so photo column matches content column height on lg+ --}}
        <div class="grid gap-10 lg:grid-cols-2 lg:gap-16">

            {{-- ============== Moodboard placeholder ============== --}}
            <figure class="relative isolate aspect-[4/3] overflow-hidden rounded-2xl bg-noir shadow-md lg:aspect-auto lg:h-full lg:min-h-[560px]">
                <div aria-hidden="true" class="absolute inset-0" style="{{ $moodboardStyle }}"></div>

                {{-- subtle film grain (spójne z <x-offer-card>) --}}
                <div aria-hidden="true" class="absolute inset-0 opacity-[0.04] mix-blend-overlay"
                     style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22/></filter><rect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/></svg>'); background-size: 220px 220px;"></div>

                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-noir/40 via-transparent to-transparent"></div>

                {{-- moodboard tag --}}
                <span class="absolute left-5 top-5 inline-flex items-center gap-2 rounded-pill border border-ivory/30 bg-noir/40 px-3 py-1 font-sans text-[0.65rem] uppercase tracking-[0.18em] text-ivory/80 backdrop-blur-sm">
                    <span class="h-1.5 w-1.5 rounded-full bg-champagne"></span>
                    Moodboard · zdjęcie duetu
                </span>

                <figcaption class="sr-only">Placeholder moodboardowy — zdjęcie duetu do podmiany</figcaption>
            </figure>

            {{-- ============== Content ============== --}}
            <div class="flex flex-col">
                <x-eyebrow class="mb-5">O nas</x-eyebrow>

                <h2 class="mb-7 font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                    Stoimy za tym razem.
                </h2>

                <div class="space-y-5 font-sans text-base leading-relaxed text-charcoal md:text-lg">
                    <p>
                        Spotkaliśmy się na evencie, gdzie każdy grał po swojej stronie sali.
                        <strong class="font-semibold text-noir">[Imię]</strong> — lata w produkcji muzycznej,
                        precyzyjne miksy i słuch wyrobiony na setkach imprez.
                        <strong class="font-semibold text-noir">[Imię]</strong> — klubowa energia,
                        instynkt do ludzi i akordeon w bagażniku.
                    </p>
                    <p>
                        Dzieli nas dekada doświadczenia. Łączy jedno podejście — wesele to nie playlista,
                        to wieczór z żywymi ludźmi, którzy chcą się dobrze bawić.
                    </p>
                    <p>
                        Połączyliśmy siły, bo razem możemy dać Wam coś, czego żaden z nas nie dałby osobno:
                        spokojną muzykę przy obiedzie, zabawę przy której nie schodzicie z parkietu
                        i biesiadę z akordeonem na żywo w jednym wieczorze, bez kompromisów.
                    </p>
                </div>

                {{-- Spotify playlist preview --}}
                <div class="mt-8">
                    <x-eyebrow tone="mute" class="mb-3 text-[0.65rem]">Nasza playlista</x-eyebrow>
                    <x-spotify-embed :playlist="$playlistId" :height="352" title="Wedding Masters — playlista" />
                </div>
            </div>
        </div>
    </div>
</section>
