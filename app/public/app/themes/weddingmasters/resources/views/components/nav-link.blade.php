{{--
    Component: x-nav-link
    See DESIGN_SYSTEM.md §2.
    Props:
      - href:     string
      - active:   bool      (default false)
      - dropdown: bool      (default false)  renders ▾ chevron after label
      - tone:     'dark'|'light' (default 'dark')  text color base for current bg
--}}
@props([
    'href' => '#',
    'active' => false,
    'dropdown' => false,
    'tone' => 'dark',
])

@php
    $base = 'group relative inline-flex items-center gap-1 font-sans text-sm font-medium transition-colors duration-150 ease-glam';

    $toneClasses = $tone === 'light'
        ? 'text-ivory/85 hover:text-ivory'
        : 'text-charcoal hover:text-noir';

    $activeClasses = $active
        ? ($tone === 'light' ? 'text-ivory' : 'text-noir')
        : '';

    $classes = trim("{$base} {$toneClasses} {$activeClasses}");
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} @if ($active) aria-current="page" @endif>
    <span class="relative">
        {{ $slot }}
        {{-- champagne underline that grows on hover, full width when active --}}
        <span aria-hidden="true"
              class="absolute -bottom-1 left-0 h-px bg-champagne transition-all duration-150 ease-glam {{ $active ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
    </span>
    @if ($dropdown)
        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="opacity-70" aria-hidden="true">
            <polyline points="6 9 12 15 18 9"/>
        </svg>
    @endif
</a>
