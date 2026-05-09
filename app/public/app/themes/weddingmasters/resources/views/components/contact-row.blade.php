{{--
    Component: x-contact-row
    Icon (slot) + bold label + sub-copy. Whole row is a link when href provided.
    See DESIGN_SYSTEM.md §2.
    Props:
      - label: string  REQUIRED  primary text (e.g. phone number, email)
      - sub:   string|null       secondary description
      - href:  string|null       optional href (renders as <a>); falls back to <div>
--}}
@props([
    'label',
    'sub' => null,
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'div';
    $base = 'group flex items-center gap-4';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $base]) }}>

    {{-- Icon disc --}}
    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-noir text-ivory transition-colors duration-150 ease-glam group-hover:bg-champagne group-hover:text-noir">
        {{ $slot }}
    </span>

    {{-- Text --}}
    <span class="flex flex-col">
        <strong class="font-serif text-base font-semibold leading-tight text-noir transition-colors duration-150 ease-glam group-hover:text-charcoal md:text-lg">
            {{ $label }}
        </strong>
        @if ($sub)
            <span class="font-sans text-sm leading-snug text-charcoal">{{ $sub }}</span>
        @endif
    </span>
</{{ $tag }}>
