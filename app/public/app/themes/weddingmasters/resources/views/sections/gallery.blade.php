{{--
    Section 06 — Galeria
    Wireframe ref: §06. Editorial moodboard mosaic — 6 tiles na mobile / 9 na md+.
    Bez zdjęć: <x-gallery-tile> renderuje moodboardowy gradient + grain per accent.
    Ostatnie 3 tile-y `hidden md:block` żeby zachować spec 6/9.
--}}
@php
    // 2 wiersze: 4 kafelki na mobile (2-col) / 6 na md+ (3-col).
    // Pierwsze 3 (top md+) różnej wysokości: landscape → portrait → square.
    // Pierwsze 2 (top mobile): landscape → portrait.
    $tiles = [
        ['accent' => 'warm',     'aspect' => 'landscape'],
        ['accent' => 'gold',     'aspect' => 'portrait'],
        ['accent' => 'rose',     'aspect' => 'square',    'extra' => 'hidden md:block'],
        ['accent' => 'charcoal', 'aspect' => 'portrait'],
        ['accent' => 'gold',     'aspect' => 'landscape'],
        ['accent' => 'warm',     'aspect' => 'portrait',  'extra' => 'hidden md:block'],
    ];
@endphp

<section id="galeria" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- ============== Section heading ============== --}}
        <div class="mb-10 max-w-2xl md:mb-14">
            <x-eyebrow class="mb-5">Galeria</x-eyebrow>
            <h2 class="mb-5 font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                Wieczory, na które<br>wraca się wspomnieniem.
            </h2>
            <p class="font-sans text-base leading-relaxed text-charcoal md:text-lg">
                Kadry z wesel, na których graliśmy. Pierwsze tańce, akordeon przy stołach,
                pełen parkiet o piątej rano — to, co zostaje na zawsze.
            </p>
        </div>

        {{-- ============== Tiles — Pinterest-style masonry ==============
             CSS columns: gap-x sterowane `gap-*`, gap-y per kafelek przez mb-*.
             break-inside-avoid pilnuje, żeby kafelek nie pękał między kolumnami. --}}
        <div class="columns-2 gap-3 md:columns-3 md:gap-4">
            @foreach ($tiles as $t)
                <x-gallery-tile
                    :accent="$t['accent']"
                    :aspect="$t['aspect']"
                    :class="trim('mb-3 md:mb-4 break-inside-avoid '.($t['extra'] ?? ''))"
                />
            @endforeach
        </div>

        {{-- ============== CTA ============== --}}
        <div class="mt-10 flex justify-center md:mt-14">
            <x-button href="/galeria" variant="outline" tone="dark">
                Zobacz pełną galerię
            </x-button>
        </div>

    </div>
</section>
