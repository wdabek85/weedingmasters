{{--
    Component: x-logo
    Image-based wordmark — dwie wersje pliku per tło:
      tone="dark"  → nazwa.png              (na jasnym tle — nav)
      tone="light" → logoweddingmasters.png (na ciemnym tle — footer)
    See DESIGN_SYSTEM.md §2.
    Props:
      - size: 'sm' | 'md' | 'lg'  (default 'md')
      - tone: 'dark' | 'light'    (default 'dark')
      - href: string|null         (default home_url) — false = render as plain span
--}}
@props([
    'size' => 'md',
    'tone' => 'dark',
    'href' => home_url('/'),
])

@php
    $sizeClasses = [
        'sm' => 'h-8 md:h-9',
        'md' => 'h-10 md:h-12',
        'lg' => 'h-24 md:h-32',
    ][$size] ?? 'h-10 md:h-12';

    $imgFile = $tone === 'light' ? 'logoweddingmasters.png' : 'nazwa.png';
    $imgSrc  = get_theme_file_uri('resources/images/' . $imgFile);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center', 'aria-label' => 'Wedding Masters — strona główna']) }}>
        <img src="{{ $imgSrc }}" alt="Wedding Masters" class="w-auto {{ $sizeClasses }}" />
    </a>
@else
    <span {{ $attributes->merge(['class' => 'inline-flex items-center']) }}>
        <img src="{{ $imgSrc }}" alt="Wedding Masters" class="w-auto {{ $sizeClasses }}" />
    </span>
@endif
