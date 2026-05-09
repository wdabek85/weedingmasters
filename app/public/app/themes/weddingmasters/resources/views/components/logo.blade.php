{{--
    Component: x-logo
    Wordmark for Wedding Masters (text-only placeholder, see DESIGN_SYSTEM.md §2).
    Props:
      - size: 'sm' | 'md' | 'lg'  (default 'md')
      - tone: 'dark' | 'light'    (default 'dark')  -- color on light bg / on dark bg
      - href: string|null         (default home_url) -- set href=false to render as plain span
--}}
@props([
    'size' => 'md',
    'tone' => 'dark',
    'href' => home_url('/'),
])

@php
    $sizeClasses = [
        'sm' => 'text-xl md:text-2xl',
        'md' => 'text-2xl md:text-3xl',
        'lg' => 'text-3xl md:text-5xl',
    ][$size] ?? 'text-2xl md:text-3xl';

    $toneClasses = $tone === 'light' ? 'text-ivory' : 'text-noir';
    $accentTone  = $tone === 'light' ? 'text-champagne' : 'text-champagne';

    $base = "font-serif font-semibold leading-none tracking-tight inline-flex items-baseline gap-[0.35ch] {$sizeClasses} {$toneClasses}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $base, 'aria-label' => 'Wedding Masters — strona główna']) }}>
        <span>Wedding</span><span class="{{ $accentTone }}">·</span><span>Masters</span>
    </a>
@else
    <span {{ $attributes->merge(['class' => $base]) }}>
        <span>Wedding</span><span class="{{ $accentTone }}">·</span><span>Masters</span>
    </span>
@endif
