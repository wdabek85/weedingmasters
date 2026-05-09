{{--
    Component: x-section-divider
    Editorial ornament between major sections — champagne diamond flanked by hairlines.
    See DESIGN_SYSTEM.md §2.
    Props:
      - tone:    'light' | 'dark'  (default 'light')
      - ornament: string            (default '◆')   any glyph
--}}
@props([
    'tone' => 'light',
    'ornament' => '◆',
])

@php
    $isDark = $tone === 'dark';
    $bgClass = $isDark ? 'bg-noir' : 'bg-ivory';
    $hairline = $isDark ? 'bg-ivory/15' : 'bg-line';
@endphp

<div class="{{ $bgClass }}">
    <div class="container-glam">
        <div class="flex items-center justify-center py-10 md:py-14">
            <span aria-hidden="true" class="h-px w-16 {{ $hairline }} md:w-24"></span>
            <span aria-hidden="true" class="mx-5 font-serif text-base text-champagne md:mx-6 md:text-lg">{{ $ornament }}</span>
            <span aria-hidden="true" class="h-px w-16 {{ $hairline }} md:w-24"></span>
        </div>
    </div>
</div>
