{{--
    Component: x-check-item
    Filled circle + checkmark icon + label slot. Used in about checklist.
    See DESIGN_SYSTEM.md §2.
    Props:
      - tone: 'champagne' | 'dark'  (default 'champagne')
      - size: 'sm' | 'md'           (default 'md')
--}}
@props([
    'tone' => 'champagne',
    'size' => 'md',
])

@php
    $iconColor = match ($tone) {
        'dark'      => 'text-noir',
        'champagne' => 'text-champagne',
        default     => 'text-champagne',
    };

    $iconSize = $size === 'sm' ? 18 : 22;
    $textSize = $size === 'sm' ? 'text-sm' : 'text-base';
@endphp

<li {{ $attributes->merge(['class' => 'flex items-center gap-3']) }}>
    <span aria-hidden="true" class="{{ $iconColor }} flex shrink-0">
        <svg width="{{ $iconSize }}" height="{{ $iconSize }}" viewBox="0 0 24 24" fill="none">
            <circle cx="12" cy="12" r="11" fill="currentColor"/>
            <polyline points="8.5 12.5 11 14.5 16 9.5"
                      stroke="#FAF7F2" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
    </span>
    <span class="font-sans {{ $textSize }} leading-snug text-charcoal">{{ $slot }}</span>
</li>
