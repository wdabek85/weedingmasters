{{--
    Component: x-marquee
    Continuous horizontal scrolling ticker. Items are duplicated automatically for seamless loop.
    See DESIGN_SYSTEM.md §2.
    Props:
      - items:    array  list of strings to display
      - separator: string  (default '·')  rendered in champagne between items
      - tone:     'dark' | 'light'  (default 'dark')   bg + text contrast
--}}
@props([
    'items' => [],
    'separator' => '·',
    'tone' => 'dark',
])

@php
    $isDark = $tone === 'dark';
    $bgClass = $isDark ? 'bg-noir text-ivory' : 'bg-cream text-noir';
    $sepClass = 'text-champagne';
    $textClass = $isDark ? 'text-ivory/90' : 'text-noir';
@endphp

<div {{ $attributes->merge([
    'class' => "relative isolate overflow-hidden border-y border-charcoal/40 py-5 md:py-6 {$bgClass}",
]) }}>

    {{-- Edge fade masks --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-0 z-10 w-16 bg-gradient-to-r from-current to-transparent opacity-100" style="color: {{ $isDark ? '#0A0A0A' : '#F2EBDD' }};"></div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 right-0 z-10 w-16 bg-gradient-to-l from-current to-transparent opacity-100" style="color: {{ $isDark ? '#0A0A0A' : '#F2EBDD' }};"></div>

    <div class="flex w-max animate-marquee">
        {{-- Render items twice for seamless loop --}}
        @for ($i = 0; $i < 2; $i++)
            <div class="flex shrink-0 items-center" aria-hidden="{{ $i === 1 ? 'true' : 'false' }}">
                @foreach ($items as $item)
                    <span class="px-6 font-serif text-lg font-medium tracking-tight md:text-xl {{ $textClass }}">
                        {{ $item }}
                    </span>
                    <span class="px-2 text-base {{ $sepClass }}">{{ $separator }}</span>
                @endforeach
            </div>
        @endfor
    </div>
</div>
