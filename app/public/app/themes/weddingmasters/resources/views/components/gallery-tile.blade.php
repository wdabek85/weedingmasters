{{--
    Component: x-gallery-tile
    Used in sections/gallery. Bez `image` renderuje moodboardowy placeholder
    (radial gradient + grain), spójny z <x-offer-card>.
    See DESIGN_SYSTEM.md §2.
    Props:
      - image:  string|null     full URL; gdy brak → placeholder per `accent`
      - alt:    string          (default '')
      - href:   string|null     opcjonalny link; w innym wypadku <div>
      - aspect: 'square' | 'portrait' | 'landscape'  (default 'square')
      - accent: 'gold' | 'rose' | 'charcoal' | 'warm'  (default 'gold')
--}}
@props([
    'image' => null,
    'alt' => '',
    'href' => null,
    'aspect' => 'square',
    'accent' => 'gold',
])

@php
    $aspectClass = match ($aspect) {
        'portrait'  => 'aspect-[3/4]',
        'landscape' => 'aspect-[4/3]',
        default     => 'aspect-square',
    };

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

    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @endif
    {{ $attributes->merge([
        'class' => "group relative isolate block overflow-hidden rounded-md bg-noir shadow-md transition-shadow duration-300 ease-glam hover:shadow-lg {$aspectClass}",
    ]) }}>

    {{-- bg: image OR moodboard gradient placeholder --}}
    @if ($image)
        <div aria-hidden="true"
             class="absolute inset-0 bg-cover bg-center transition-transform duration-500 ease-glam group-hover:scale-[1.04]"
             style="background-image: url('{{ $image }}');"></div>
    @else
        <div aria-hidden="true"
             class="absolute inset-0 transition-transform duration-500 ease-glam group-hover:scale-[1.04]"
             style="{{ $accentStyle }}"></div>
        {{-- film grain — spójne z <x-offer-card> --}}
        <div aria-hidden="true" class="absolute inset-0 opacity-[0.04] mix-blend-overlay"
             style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22/></filter><rect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/></svg>'); background-size: 220px 220px;"></div>
    @endif

    {{-- legibility: subtle bottom gradient --}}
    <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-noir/55 via-transparent to-transparent"></div>

    {{-- Alt text dla SR gdy image z prawdziwym alt --}}
    @if ($image && $alt)
        <span class="sr-only">{{ $alt }}</span>
    @endif

</{{ $tag }}>
