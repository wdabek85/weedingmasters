{{--
    Component: x-phone-pill
    See DESIGN_SYSTEM.md §2.
    Props:
      - tel:    string  (required) e.g. "+48123456789"
      - label:  string  (default = formatted tel)
      - tone:   'dark'|'light' (default 'dark')  -- pill style
      - size:   'sm'|'md'      (default 'md')
--}}
@props([
    'tel' => '',
    'label' => null,
    'tone' => 'dark',
    'size' => 'md',
])

@php
    $display = $label ?? $tel;
    $href = 'tel:' . preg_replace('/[^0-9+]/', '', $tel);

    // Geometria + typografia spójna z <x-button> (uppercase, tracking-[0.18em],
    // ten sam rytm padding/text-size). Zob. DESIGN_SYSTEM.md §2.
    $base = 'inline-flex items-center justify-center gap-2 font-sans font-medium uppercase whitespace-nowrap transition-colors duration-150 ease-glam';

    $sizeClasses = [
        'sm' => 'px-5 py-2.5 text-[0.7rem] tracking-[0.18em]',
        'md' => 'px-7 py-3.5 text-xs tracking-[0.18em]',
    ][$size] ?? 'px-7 py-3.5 text-xs tracking-[0.18em]';

    $toneClasses = $tone === 'light'
        ? 'bg-ivory text-noir hover:bg-champagne'
        : 'bg-noir text-ivory hover:bg-champagne hover:text-noir';

    $classes = trim("{$base} {$sizeClasses} {$toneClasses}");
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} aria-label="Zadzwoń: {{ $display }}">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
    </svg>
    <span>{{ $display }}</span>
</a>
