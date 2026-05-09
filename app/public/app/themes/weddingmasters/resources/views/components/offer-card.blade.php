{{--
    Component: x-offer-card
    See DESIGN_SYSTEM.md §2. Used in sections/offers.
    Props:
      - title:       string  required
      - description: string  required
      - href:        string  (default '#')
      - image:       string|null  full URL; when present, overrides `accent` placeholder
      - accent:      'gold' | 'rose' | 'charcoal' | 'warm'  (default 'gold')   gradient placeholder until photo arrives
      - featured:    bool    (default false)   tall card with visible CTA button
      - cta:         string  (default 'Dowiedz się więcej')
--}}
@props([
    'title' => '',
    'description' => '',
    'href' => '#',
    'image' => null,
    'accent' => 'gold',
    'featured' => false,
    'cta' => 'Dowiedz się więcej',
])

@php
    // Layered radial-gradient placeholder per accent (until real photos arrive).
    $accentStyle = match ($accent) {
        'gold' =>
            'background:'
            .' radial-gradient(ellipse 70% 60% at 70% 25%, rgba(201,169,97,0.45), transparent 60%),'
            .' radial-gradient(ellipse 50% 45% at 25% 75%, rgba(168,139,63,0.35), transparent 55%),'
            .' radial-gradient(ellipse 30% 30% at 50% 45%, rgba(255,225,165,0.20), transparent 60%),'
            .' #0A0A0A;',
        'rose' =>
            'background:'
            .' radial-gradient(ellipse 65% 55% at 70% 25%, rgba(232,196,196,0.35), transparent 60%),'
            .' radial-gradient(ellipse 50% 45% at 25% 70%, rgba(201,169,97,0.30), transparent 55%),'
            .' radial-gradient(ellipse 35% 35% at 50% 50%, rgba(232,196,196,0.18), transparent 60%),'
            .' #0A0A0A;',
        'charcoal' =>
            'background:'
            .' radial-gradient(ellipse 55% 45% at 75% 30%, rgba(201,169,97,0.25), transparent 60%),'
            .' radial-gradient(ellipse 65% 50% at 25% 70%, rgba(31,31,31,0.65), transparent 55%),'
            .' #0A0A0A;',
        'warm' =>
            'background:'
            .' radial-gradient(ellipse 70% 55% at 30% 30%, rgba(255,225,165,0.40), transparent 60%),'
            .' radial-gradient(ellipse 60% 50% at 75% 75%, rgba(201,169,97,0.40), transparent 55%),'
            .' radial-gradient(ellipse 30% 30% at 60% 40%, rgba(232,196,196,0.20), transparent 60%),'
            .' #0A0A0A;',
        default =>
            'background:'
            .' radial-gradient(ellipse 60% 50% at 70% 30%, rgba(201,169,97,0.4), transparent 60%),'
            .' #0A0A0A;',
    };

    // Aspect on mobile/md (intrinsic height), removed at lg+ where grid-rows controls height.
    $aspect = $featured
        ? 'aspect-[4/5] lg:aspect-auto'
        : 'aspect-[5/4] lg:aspect-auto';

    $padding = $featured
        ? 'p-7 md:p-8 lg:p-9'
        : 'p-5 md:p-6';

    $titleSize = $featured
        ? 'text-2xl md:text-3xl lg:text-4xl'        // 24 / 30 / 36
        : 'text-xl md:text-2xl';                    // 20 / 24

    $descSize = $featured
        ? 'text-sm md:text-base'
        : 'text-[0.8rem] md:text-sm';
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge([
       'class' => "group relative isolate flex h-full flex-col justify-end overflow-hidden rounded-2xl bg-noir text-ivory shadow-md transition-all duration-300 ease-glam hover:-translate-y-0.5 hover:shadow-lg {$aspect}",
   ]) }}>

    {{-- bg: image OR gradient placeholder --}}
    @if ($image)
        <div aria-hidden="true"
             class="absolute inset-0 bg-cover bg-center transition-transform duration-500 ease-glam group-hover:scale-[1.04]"
             style="background-image: url('{{ $image }}');"></div>
    @else
        <div aria-hidden="true"
             class="absolute inset-0 transition-transform duration-500 ease-glam group-hover:scale-[1.04]"
             style="{{ $accentStyle }}"></div>
        {{-- subtle film grain --}}
        <div aria-hidden="true" class="absolute inset-0 opacity-[0.04] mix-blend-overlay"
             style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22/></filter><rect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/></svg>'); background-size: 220px 220px;"></div>
    @endif

    {{-- bottom-up dark gradient for legibility --}}
    <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-noir/95 via-noir/55 to-transparent"></div>

    {{-- content --}}
    <div class="relative {{ $padding }}">
        <h3 class="mb-2 font-serif font-semibold leading-[1.1] text-ivory {{ $titleSize }}">
            {{ $title }}
        </h3>
        <p class="max-w-md font-sans leading-relaxed text-ivory/80 {{ $descSize }}">
            {{ $description }}
        </p>
        @if ($featured)
            <div class="mt-6 inline-block">
                <span class="inline-flex items-center gap-2 rounded-sm border border-ivory/40 px-5 py-2.5 text-[0.7rem] font-medium uppercase tracking-[0.18em] text-ivory transition-colors duration-150 ease-glam group-hover:border-champagne group-hover:bg-champagne group-hover:text-noir">
                    {{ $cta }}
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="-mr-1" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </span>
            </div>
        @endif
    </div>
</a>
