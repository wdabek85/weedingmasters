{{--
    Component: x-testimonial-card
    Editorial pull-quote card — wedding party feedback.
    See DESIGN_SYSTEM.md §2.
    Props:
      - quote:    string|slot   główny cytat
      - name:     string        np. "Anna i Marek"
      - location: string|null   np. "Pałac Mortęgi"
      - date:     string|null   np. "Lipiec 2025"
--}}
@props([
    'quote' => null,
    'name' => '',
    'location' => null,
    'date' => null,
])

@php
    $meta = trim(implode(' · ', array_filter([$location, $date])));
@endphp

<figure {{ $attributes->merge([
    'class' => 'group relative flex h-full flex-col rounded-md border border-line bg-ivory p-7 shadow-sm transition-shadow duration-300 ease-glam hover:shadow-md md:p-8',
]) }}>

    {{-- Big champagne opening quote glyph --}}
    <span aria-hidden="true"
          class="pointer-events-none mb-3 block font-serif text-6xl leading-none text-champagne md:text-7xl">
        &ldquo;
    </span>

    {{-- Quote --}}
    <blockquote class="flex-1 font-serif text-lg italic leading-[1.45] text-noir md:text-xl">
        {{ $quote ?? $slot }}
    </blockquote>

    {{-- Hairline --}}
    <span aria-hidden="true" class="my-6 block h-px w-12 bg-champagne/60"></span>

    {{-- Byline --}}
    <figcaption class="flex flex-col">
        <span class="font-serif text-base font-semibold leading-tight text-noir md:text-lg">
            {{ $name }}
        </span>
        @if ($meta !== '')
            <span class="mt-1 font-sans text-sm leading-snug text-mute">
                {{ $meta }}
            </span>
        @endif
    </figcaption>
</figure>
