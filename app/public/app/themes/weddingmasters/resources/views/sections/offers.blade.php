{{--
    Section 04 — Oferta ("Co gramy")
    Wireframe ref: §04. Inspiration: text intro + 1 featured + 3 small mosaic.
    Grid:
      mobile : 1 col — text → Wesela → Studniówki → Eventy → 18-tki
      md     : 2 cols — text(cs2) → Wesela(cs2) → Studniówki|Eventy → 18-tki(cs2)
      lg+    : 4 cols (1fr 1.6fr 1fr 1fr) × 2 rows
               | text(rs2) | Wesela(rs2) | Studniówki | Eventy   |
               | text(rs2) | Wesela(rs2) | 18-tki(cs2)            |
--}}
@php
    // Moodboard placeholders (komponent <x-offer-card> renderuje radial-gradient
    // wg accent — patrz components/offer-card.blade.php). Realne zdjęcia wpadną z ACF.
    $small = [
        [
            'title' => 'Studniówki',
            'description' => 'Elegancko, z klasą i najlepszym klimatem.',
            'href' => '#',
            'accent' => 'charcoal',
            'cs' => 'lg:col-span-1',
        ],
        [
            'title' => 'Eventy firmowe',
            'description' => 'Muzyka, która buduje atmosferę i integruje.',
            'href' => '#',
            'accent' => 'warm',
            'cs' => 'lg:col-span-1',
        ],
        [
            'title' => '18-tki, jubileusze',
            'description' => 'Twoja impreza, nasza energia. Zabawa na najwyższym poziomie.',
            'href' => '#',
            'accent' => 'rose',
            'cs' => 'md:col-span-2 lg:col-span-2',
        ],
    ];
@endphp

<section id="oferta" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-[1fr_1.6fr_1fr_1fr] lg:grid-rows-[minmax(280px,1fr)_minmax(280px,1fr)] lg:gap-5">

            {{-- ============== Text intro ============== --}}
            <div class="md:col-span-2 lg:col-span-1 lg:row-span-2 lg:flex lg:flex-col lg:justify-start lg:pr-2">
                <x-eyebrow class="mb-5">Co gramy</x-eyebrow>
                <h2 class="mb-5 font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                    Dobieramy oprawę<br>do Waszej historii.
                </h2>
                <p class="max-w-md font-sans text-base leading-relaxed text-charcoal">
                    Różne okazje, ten sam cel — niezapomniane emocje i pełny parkiet.
                </p>
            </div>

            {{-- ============== Wesela (featured) ============== --}}
            <x-offer-card
                title="Wesela"
                description="Pełna oprawa muzyczna i prowadzenie wesela od początku do ostatniego tańca."
                href="#"
                accent="gold"
                :featured="true"
                cta="Dowiedz się więcej"
                class="md:col-span-2 lg:col-span-1 lg:row-span-2"
            />

            {{-- ============== Small cards ============== --}}
            @foreach ($small as $o)
                <x-offer-card
                    :title="$o['title']"
                    :description="$o['description']"
                    :href="$o['href']"
                    :accent="$o['accent']"
                    :class="$o['cs']"
                />
            @endforeach
        </div>
    </div>
</section>
