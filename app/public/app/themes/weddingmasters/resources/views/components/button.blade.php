{{--
    Component: x-button
    See DESIGN_SYSTEM.md §2.
    Props:
      - variant: 'primary' | 'outline' | 'dark'  (default 'primary')
                 primary  = champagne fill (brand accent CTA)
                 outline  = transparent + border, color flips by tone
                 dark     = solid noir fill + ivory text, hover→champagne (use on photo/dark hero)
      - tone:    'dark' | 'light'         (default 'dark')   tone of the surrounding bg
      - size:    'sm' | 'md'              (default 'md')
      - block:   bool                     (default false)    full-width
      - as:      'a' | 'button'           (default 'a')
      - href:    string|null
      - type:    'button' | 'submit'      (default 'button') only when as=button
--}}
@props([
    'variant' => 'primary',
    'tone' => 'dark',
    'size' => 'md',
    'block' => false,
    'as' => 'a',
    'href' => null,
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 font-sans font-medium uppercase whitespace-nowrap transition-colors duration-150 ease-glam disabled:opacity-50 disabled:cursor-not-allowed';

    $sizeClasses = [
        'sm' => 'px-5 py-2.5 text-[0.7rem] tracking-[0.18em]',
        'md' => 'px-7 py-3.5 text-xs tracking-[0.18em]',
    ][$size] ?? 'px-7 py-3.5 text-xs tracking-[0.18em]';

    // primary = champagne (brand accent), tone-independent
    // outline = transparent + border, flips by tone
    // dark    = solid noir + ivory text, hover→champagne (photo heroes)
    $variantClasses = match ([$variant, $tone]) {
        ['primary', 'light']   => 'bg-champagne text-noir hover:bg-gold-deep hover:text-ivory',
        ['primary', 'dark']    => 'bg-champagne text-noir hover:bg-gold-deep hover:text-ivory',
        ['outline', 'light']   => 'border border-ivory/80 text-ivory hover:bg-ivory hover:text-noir',
        ['outline', 'dark']    => 'border border-noir text-noir hover:bg-noir hover:text-ivory',
        ['dark', 'light'],
        ['dark', 'dark']       => 'bg-champagne text-noir border border-champagne backdrop-blur-sm hover:bg-noir/85 hover:text-ivory hover:border-ivory/40',
        default                => 'bg-champagne text-noir hover:bg-gold-deep hover:text-ivory',
    };

    $blockClass = $block ? 'w-full' : '';

    $classes = trim("{$base} {$sizeClasses} {$variantClasses} {$blockClass}");
@endphp

@if ($as === 'button')
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@else
    <a @if ($href) href="{{ $href }}" @endif {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif
