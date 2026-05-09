{{--
    Component: x-channel-card
    Card-style contact channel: icon disc, label + sub, hover lift + champagne accent.
    Diagonal arrow in bottom-right hints at "go to external/quick-action".
    See DESIGN_SYSTEM.md §2.
    Props:
      - label:    string   REQUIRED  primary label (e.g. "Zadzwoń", "WhatsApp")
      - sub:      string|null         secondary line (number/handle)
      - href:     string   REQUIRED
      - external: bool     (default false)  if true, opens in new tab
      - slot      = icon SVG (single child)
--}}
@props([
    'label',
    'sub' => null,
    'href' => '#',
    'external' => false,
])

<a href="{{ $href }}"
   @if ($external) target="_blank" rel="noopener noreferrer" @endif
   {{ $attributes->merge([
       'class' => 'group relative flex aspect-[5/4] flex-col justify-between rounded-2xl border border-line bg-ivory p-6 transition-all duration-300 ease-glam hover:-translate-y-0.5 hover:border-champagne hover:shadow-md md:p-7',
   ]) }}>

    {{-- Icon disc --}}
    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-noir text-ivory transition-colors duration-300 ease-glam group-hover:bg-champagne group-hover:text-noir">
        {{ $slot }}
    </span>

    {{-- Label + sub --}}
    <div class="pr-8">
        <strong class="block font-serif text-lg font-semibold leading-tight text-noir md:text-xl">
            {{ $label }}
        </strong>
        @if ($sub)
            <span class="mt-1 block font-sans text-sm leading-snug text-charcoal">
                {{ $sub }}
            </span>
        @endif
    </div>

    {{-- Arrow corner --}}
    <span aria-hidden="true"
          class="absolute bottom-5 right-5 text-mute transition-all duration-300 ease-glam group-hover:translate-x-0.5 group-hover:-translate-y-0.5 group-hover:text-champagne md:bottom-6 md:right-6">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="7" y1="17" x2="17" y2="7"/>
            <polyline points="7 7 17 7 17 17"/>
        </svg>
    </span>
</a>
