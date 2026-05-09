{{--
    Component: x-icon-row
    Compact horizontal row: small disc icon (left) + title + sub.
    Used in §05 wedding-with-us. Smaller variant of contact-row pattern.
    See DESIGN_SYSTEM.md §2.
    Props:
      - title:       string  REQUIRED
      - description: string|null  smaller secondary copy below title
      - default slot = SVG icon (rendered in noir disc, currentColor → champagne)
--}}
@props([
    'title' => '',
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'flex items-start gap-4']) }}>

    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-noir text-champagne">
        {{ $slot }}
    </span>

    <div class="flex flex-col pt-0.5">
        <strong class="font-serif text-base font-semibold leading-tight text-noir md:text-lg">
            {{ $title }}
        </strong>
        @if ($description)
            <span class="mt-1 font-sans text-sm leading-snug text-charcoal">
                {{ $description }}
            </span>
        @endif
    </div>
</div>
