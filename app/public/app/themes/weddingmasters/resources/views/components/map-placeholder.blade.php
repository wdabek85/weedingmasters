{{--
    Component: x-map-placeholder
    Decorative placeholder until a real map embed is wired (Google/Mapbox).
    See DESIGN_SYSTEM.md §2.
    Props:
      - caption: string  (default 'Gramy w całej Polsce.')
      - aspect:  '4/3' | '3/2' | '1/1'  (default '4/3')
--}}
@props([
    'caption' => 'Gramy w całej Polsce.',
    'aspect' => '4/3',
])

@php
    $aspectClass = match ($aspect) {
        '3/2' => 'aspect-[3/2]',
        '1/1' => 'aspect-square',
        default => 'aspect-[4/3]',
    };
@endphp

<div {{ $attributes->merge(['class' => "relative overflow-hidden rounded-2xl border border-line bg-cream {$aspectClass}"]) }}
     role="img"
     aria-label="{{ $caption }}">

    {{-- Subtle dot grid pattern --}}
    <div aria-hidden="true" class="absolute inset-0"
         style="background-image: radial-gradient(circle, rgba(168,139,63,0.30) 1.2px, transparent 1.2px); background-size: 18px 18px;"></div>
    {{-- Soft vignette --}}
    <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(ellipse_120%_120%_at_50%_50%,transparent_45%,rgba(229,223,210,0.65)_100%)]"></div>

    {{-- Caption --}}
    <div class="relative flex h-full flex-col items-center justify-center gap-3 p-6 text-center">
        <span aria-hidden="true" class="text-champagne">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                <circle cx="12" cy="10" r="3"/>
            </svg>
        </span>
        <p class="font-serif text-lg font-semibold leading-snug text-noir md:text-xl">
            {{ $caption }}
        </p>
    </div>
</div>
