{{--
    Section 11a — Footer
    Wireframe ref: §11a (DESIGN_SYSTEM.md). Premium noir close-out:
      - top: 3-col grid (brand+socials | nav | kontakt)
      - bottom strip: copyright + legal links
    Mobile: single-col stack. md+: 12-col grid (5 / 3 / 4).
--}}
@php
    $tel = '+48 123 456 789';
    $telClean = '+48123456789';
    $email = 'kontakt@weddingmasters.pl';

    $menu = [
        ['label' => 'Strona główna', 'href' => '/'],
        ['label' => 'O nas',         'href' => '#o-nas'],
        ['label' => 'Oferta',        'href' => '#oferta'],
        ['label' => 'Galeria',       'href' => '#galeria'],
        ['label' => 'FAQ',           'href' => '#faq'],
        ['label' => 'Kontakt',       'href' => '#kontakt'],
    ];

    $socials = [
        ['platform' => 'ig', 'href' => 'https://instagram.com/'],
        ['platform' => 'fb', 'href' => 'https://facebook.com/'],
        ['platform' => 'yt', 'href' => 'https://youtube.com/'],
    ];

    $year = date('Y');
@endphp

<footer class="relative isolate overflow-hidden bg-noir text-ivory">

    {{-- Subtle champagne radial bokeh — spójne z hero/features --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_85%_15%,rgba(201,169,97,0.10),transparent_60%)]"></div>

    <div class="container-glam relative z-10 pt-section-y pb-10 md:pt-section-y-lg md:pb-12">

        {{-- ============================== TOP GRID ============================== --}}
        <div class="grid gap-12 md:grid-cols-12 md:gap-10">

            {{-- ============== Brand col (5/12) ============== --}}
            <div class="md:col-span-12 lg:col-span-5">
                <x-logo size="lg" tone="light" />

                <p class="mt-5 max-w-md font-sans text-base leading-relaxed text-ivory/70">
                    Duet DJ-ski na Wasze wesele.<br>
                    Dwóch DJ-ów grających razem albo osobno.
                    Plan wesela ustalamy z Wami, resztą zajmujemy się my.
                </p>

                <div class="mt-7 flex items-center gap-3">
                    @foreach ($socials as $s)
                        <x-social-link :platform="$s['platform']" :href="$s['href']" tone="dark" />
                    @endforeach
                </div>
            </div>

            {{-- ============== Menu col (3/12) ============== --}}
            <nav class="md:col-span-6 lg:col-span-3" aria-label="Menu w stopce">
                <x-eyebrow tone="champagne" class="mb-5">Nawigacja</x-eyebrow>
                <ul class="flex flex-col gap-3">
                    @foreach ($menu as $item)
                        <li>
                            <a href="{{ $item['href'] }}"
                               class="group relative inline-flex items-center font-sans text-sm font-medium text-ivory/75 transition-colors duration-150 ease-glam hover:text-ivory">
                                <span class="relative">
                                    {{ $item['label'] }}
                                    <span aria-hidden="true" class="absolute -bottom-1 left-0 h-px w-0 bg-champagne transition-all duration-150 ease-glam group-hover:w-full"></span>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            {{-- ============== Kontakt col (4/12) ============== --}}
            <div class="md:col-span-6 lg:col-span-4">
                <x-eyebrow tone="champagne" class="mb-5">Kontakt</x-eyebrow>

                <ul class="flex flex-col gap-4">
                    <li>
                        <a href="tel:{{ $telClean }}"
                           class="group flex items-center gap-3 text-ivory/85 transition-colors duration-150 ease-glam hover:text-ivory">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-ivory/20 transition-colors duration-150 ease-glam group-hover:border-champagne group-hover:bg-champagne group-hover:text-noir">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </span>
                            <span class="font-sans text-sm md:text-base">{{ $tel }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="mailto:{{ $email }}"
                           class="group flex items-center gap-3 text-ivory/85 transition-colors duration-150 ease-glam hover:text-ivory">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-ivory/20 transition-colors duration-150 ease-glam group-hover:border-champagne group-hover:bg-champagne group-hover:text-noir">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <polyline points="22 6 12 13 2 6"/>
                                </svg>
                            </span>
                            <span class="font-sans text-sm md:text-base">{{ $email }}</span>
                        </a>
                    </li>

                    <li class="flex items-center gap-3 text-ivory/70">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-ivory/20">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </span>
                        <span class="font-sans text-sm md:text-base">Gramy w całej Polsce</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- ============================== HAIRLINE ============================== --}}
        <div aria-hidden="true" class="my-10 h-px bg-ivory/10 md:my-12"></div>

        {{-- ============================== BOTTOM STRIP ============================== --}}
        <div class="flex flex-col items-start gap-4 font-sans text-xs text-ivory/55 md:flex-row md:items-center md:justify-between md:gap-6">

            <p>© {{ $year }} Wedding Masters. Wszelkie prawa zastrzeżone.</p>

            <ul class="flex flex-wrap items-center gap-x-6 gap-y-2">
                <li>
                    <a href="/polityka-prywatnosci"
                       class="transition-colors duration-150 ease-glam hover:text-ivory">
                        Polityka prywatności
                    </a>
                </li>
                <li>
                    <a href="/regulamin"
                       class="transition-colors duration-150 ease-glam hover:text-ivory">
                        Regulamin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
