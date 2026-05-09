{{--
    Component: x-step
    Editorial process step (cell-style for horizontal stepper).
    Layout per cell:
      ┌─────────────────────────┐
      │ 01 ─────────────────    │  ← numeral + connector line (lg+ only, hidden on last)
      │ Title                   │
      │ Short description       │
      └─────────────────────────┘
    Props:
      - number: string|int
      - title:  string
      - last:   bool   (default false) — hides connector on last step
      - slot is the description
--}}
@props([
    'number' => '',
    'title' => '',
    'last' => false,
])

<div {{ $attributes->merge(['class' => 'relative flex flex-col']) }}>

    {{-- Vertical rail (mobile only). Biegnie od dolnej krawędzi numeru, przez step,
         a -bottom-12 przedłuża go w grid gap-y-12 aż do numeru następnego kroku. --}}
    @unless ($last)
        <span aria-hidden="true"
              class="pointer-events-none absolute left-[1.45rem] top-14 -bottom-12 w-px bg-champagne/35 md:hidden"></span>
    @endunless

    {{-- Numeral + horizontal connector (lg+) --}}
    <div class="mb-5 flex items-center md:mb-6">
        <span aria-hidden="true"
              class="font-serif text-5xl font-semibold leading-none text-champagne lg:text-6xl">
            {{ $number }}
        </span>
        @unless ($last)
            <span aria-hidden="true"
                  class="ml-6 hidden h-px flex-1 bg-champagne/35 lg:block"></span>
        @endunless
    </div>

    {{-- Title --}}
    <h3 class="mb-3 pl-12 font-serif text-xl font-semibold leading-tight text-noir md:pl-0 md:text-2xl">
        {{ $title }}
    </h3>

    {{-- Description (short, parallel-structured per glamour editorial) --}}
    <p class="pl-12 font-sans text-base leading-relaxed text-charcoal md:pl-0">
        {{ $slot }}
    </p>
</div>
