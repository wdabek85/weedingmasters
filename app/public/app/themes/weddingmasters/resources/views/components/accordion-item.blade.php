{{--
    Component: x-accordion-item
    Single Q/A row in an accordion. Uses Alpine `x-collapse` for smooth height transition.
    See DESIGN_SYSTEM.md §2.
    Props:
      - question: string  REQUIRED
      - open:     bool    (default false)  initial open state
      - id:       string  (optional)       accessible id for aria-controls; auto-generated if absent
--}}
@props([
    'question' => '',
    'open' => false,
    'id' => null,
])

@php
    $panelId = $id ?? 'accordion-panel-' . substr(md5($question), 0, 8);
@endphp

<div x-data="{ open: @js($open) }"
     class="border-b border-line">

    <h3 class="m-0">
        <button type="button"
                @click="open = !open"
                :aria-expanded="open ? 'true' : 'false'"
                aria-controls="{{ $panelId }}"
                class="group flex w-full items-center justify-between gap-6 py-6 text-left transition-colors duration-150 ease-glam hover:text-charcoal">
            <span class="font-serif text-lg font-semibold leading-snug text-noir md:text-xl">
                {{ $question }}
            </span>
            <span aria-hidden="true" class="shrink-0 text-champagne">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="transition-transform duration-300 ease-glam"
                     :class="open ? 'rotate-45' : ''">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
            </span>
        </button>
    </h3>

    <div id="{{ $panelId }}"
         x-show="open"
         x-collapse
         x-cloak>
        <div class="max-w-2xl pb-7 pr-12 font-sans text-base leading-relaxed text-charcoal md:text-lg">
            {{ $slot }}
        </div>
    </div>
</div>
