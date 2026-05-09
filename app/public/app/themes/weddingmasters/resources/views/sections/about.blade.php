{{--
    Section 08 — O nas / Stoimy za tym razem
    Layout: 2-col split (lg+) — photo left + content right.
    Copy from wireframe §08 (lines 917-931). Spotify embed under text per user.
    Proportions: photo height stretches to match (text + Spotify) on lg+ (DS-014).
    [Imię] tokens are intentional — replace with the duo's real names before launch.
--}}
@php
    // Placeholder Spotify-curated "Today's Top Hits" — stable global playlist, always available.
    // Replace with the duo's actual playlist ID once provided.
    $playlistId = '37i9dQZF1DXcBWIGoYBM5M';
@endphp

<section id="o-nas" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- items-stretch (grid default) so photo column matches content column height on lg+ --}}
        <div class="grid gap-10 lg:grid-cols-2 lg:gap-16">

            {{-- ============== Photo: duet ============== --}}
            <figure class="relative isolate aspect-[4/3] overflow-hidden rounded-2xl bg-noir shadow-md lg:aspect-auto lg:h-full lg:min-h-[560px]">
                <img src="{{ get_theme_file_uri('resources/images/duet.webp') }}"
                     alt="Wedding Masters — duet DJ-ski"
                     class="absolute inset-0 h-full w-full object-cover"
                     loading="lazy" decoding="async" />

                {{-- subtle bottom gradient dla legibility ewentualnych overlay-ów --}}
                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-noir/30 via-transparent to-transparent"></div>
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
