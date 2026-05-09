{{--
    Component: x-eyebrow
    Small uppercase label used above section headings.
    See DESIGN_SYSTEM.md §2.
    Props:
      - tone: 'champagne' | 'mute' | 'ivory'  (default 'champagne')
      - as:   'span' | 'p' | 'div'            (default 'span')
--}}
@props([
    'tone' => 'champagne',
    'as' => 'span',
])

@php
    $toneClass = match ($tone) {
        'mute'      => 'text-mute',
        'ivory'     => 'text-ivory/80',
        'champagne' => 'text-champagne',
        default     => 'text-champagne',
    };

    $classes = "inline-block font-sans text-eyebrow uppercase tracking-[0.28em] {$toneClass}";

    $tag = in_array($as, ['span', 'p', 'div'], true) ? $as : 'span';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</{{ $tag }}>
