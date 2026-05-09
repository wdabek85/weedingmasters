{{--
    Site nav (00a) — wireframe ref §00 (lines 718-731 / 1066-1078).
    Sticky ivory bar with hairline border. Mobile: drawer triggered by hamburger.
    Anchors point to in-page sections (will be replaced by routes once subpages exist).
--}}
@php
    $menu = [
        ['label' => 'Strona główna', 'href' => '/',         'dropdown' => false, 'active' => is_front_page()],
        ['label' => 'O nas',         'href' => '#o-nas',    'dropdown' => false, 'active' => false],
        ['label' => 'Oferta',        'href' => '#oferta',   'dropdown' => false, 'active' => false],
        ['label' => 'Galeria',       'href' => '#galeria',  'dropdown' => false, 'active' => false],
        ['label' => 'FAQ',           'href' => '#faq',      'dropdown' => false, 'active' => false],
        ['label' => 'Kontakt',       'href' => '#kontakt',  'dropdown' => false, 'active' => false],
    ];
    $tel = '+48 123 456 789';
@endphp

<header
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    :class="open ? 'is-open' : ''"
    class="site-header sticky top-0 z-50 border-b border-line bg-ivory/95 backdrop-blur"
>
    <div class="container-glam flex items-center justify-between gap-6 py-4">

        {{-- Logo --}}
        <x-logo size="sm" tone="dark" class="shrink-0" />

        {{-- Desktop menu --}}
        <nav class="hidden lg:flex items-center gap-7" aria-label="Menu główne">
            @foreach ($menu as $item)
                <x-nav-link
                    :href="$item['href']"
                    :active="$item['active']"
                    :dropdown="$item['dropdown']"
                >
                    {{ $item['label'] }}
                </x-nav-link>
            @endforeach
        </nav>

        {{-- Desktop phone CTA --}}
        <div class="hidden lg:block shrink-0">
            <x-phone-pill :tel="$tel" tone="dark" size="sm" />
        </div>

        {{-- Mobile hamburger --}}
        <button
            type="button"
            class="lg:hidden inline-flex h-10 w-10 items-center justify-center text-noir hover:text-champagne transition-colors duration-150 ease-glam"
            aria-label="Otwórz menu"
            aria-controls="mobile-drawer"
            :aria-expanded="open ? 'true' : 'false'"
            @click="open = !open"
        >
            {{-- hamburger icon, swaps to X when open --}}
            <svg x-show="!open" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="4" y1="7" x2="20" y2="7"/>
                <line x1="4" y1="12" x2="20" y2="12"/>
                <line x1="4" y1="17" x2="20" y2="17"/>
            </svg>
            <svg x-show="open" x-cloak width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="6" y1="6" x2="18" y2="18"/>
                <line x1="18" y1="6" x2="6" y2="18"/>
            </svg>
        </button>
    </div>

    {{-- Mobile drawer --}}
    <div
        id="mobile-drawer"
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-glam duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-glam duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="lg:hidden border-t border-line bg-ivory"
    >
        <nav class="container-glam flex flex-col py-4" aria-label="Menu mobilne">
            @foreach ($menu as $item)
                <a href="{{ $item['href'] }}"
                   class="flex items-center justify-between border-b border-line/60 py-4 font-sans text-base font-medium text-charcoal hover:text-noir transition-colors duration-150 ease-glam"
                   @click="open = false"
                   @if ($item['active']) aria-current="page" @endif>
                    <span>{{ $item['label'] }}</span>
                    @if ($item['dropdown'])
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-60" aria-hidden="true">
                            <polyline points="9 6 15 12 9 18"/>
                        </svg>
                    @endif
                </a>
            @endforeach

            <div class="pt-5">
                <x-phone-pill :tel="$tel" tone="dark" size="md" class="w-full justify-center" />
            </div>
        </nav>
    </div>
</header>
