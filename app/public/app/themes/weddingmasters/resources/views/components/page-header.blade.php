{{--
    Component: x-page-header
    Reusable header for every subpage (Kontakt, Oferta, Galeria, Polityka, ...).
    See DESIGN_SYSTEM.md §2.
    Props:
      - eyebrow:    string|null       small uppercase label above title
      - title:      string|null       h1
      - lead:       string|null       intro paragraph below title
      - breadcrumb: array             [['label' => '', 'href' => '']] — last item is current (no href)
      - variant:    'dark' | 'light'  (default 'dark')
      - align:      'left' | 'center' (default 'left')
--}}
@props([
    'eyebrow' => null,
    'title' => null,
    'lead' => null,
    'breadcrumb' => [],
    'variant' => 'dark',
    'align' => 'left',
])

@php
    $isDark = $variant === 'dark';

    $sectionClasses = $isDark
        ? 'bg-noir text-ivory'
        : 'bg-ivory text-noir border-b border-line';

    $titleClasses = $isDark ? 'text-ivory' : 'text-noir';
    $leadClasses  = $isDark ? 'text-ivory/80' : 'text-charcoal';

    $crumbCurrent = $isDark ? 'text-ivory' : 'text-noir';
    $crumbLink    = $isDark ? 'text-ivory/70' : 'text-charcoal';
    $crumbSep     = $isDark ? 'text-ivory/40' : 'text-mute';

    $contentAlign = $align === 'center' ? 'mx-auto text-center' : '';
@endphp

<header class="relative isolate overflow-hidden {{ $sectionClasses }}">

    {{-- Dark variant: layered radial bokeh placeholders (glamour mini-hero) --}}
    @if ($isDark)
        <div aria-hidden="true" class="absolute inset-0">
            <div class="absolute inset-0 bg-noir"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_55%_50%_at_75%_25%,rgba(201,169,97,0.22),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_45%_45%_at_25%_80%,rgba(168,139,63,0.18),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_30%_30%_at_55%_55%,rgba(232,196,196,0.10),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-noir/20 to-noir/85"></div>
        </div>
    @endif

    <div class="container-glam relative z-10 py-20 md:py-24 lg:py-28">
        <div class="max-w-3xl {{ $contentAlign }}">

            {{-- Breadcrumb --}}
            @if (!empty($breadcrumb))
                <nav aria-label="Breadcrumb" class="mb-6">
                    <ol class="flex flex-wrap items-center gap-2 font-sans text-sm {{ $align === 'center' ? 'justify-center' : '' }}">
                        @foreach ($breadcrumb as $crumb)
                            <li class="flex items-center gap-2">
                                @if (!$loop->first)
                                    <span aria-hidden="true" class="{{ $crumbSep }}">/</span>
                                @endif
                                @if (isset($crumb['href']) && !$loop->last)
                                    <a href="{{ $crumb['href'] }}"
                                       class="{{ $crumbLink }} transition-colors duration-150 ease-glam hover:text-champagne">
                                        {{ $crumb['label'] }}
                                    </a>
                                @else
                                    <span aria-current="page" class="{{ $crumbCurrent }}">{{ $crumb['label'] }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </nav>
            @endif

            {{-- Eyebrow --}}
            @if ($eyebrow)
                <x-eyebrow class="mb-5">{{ $eyebrow }}</x-eyebrow>
            @endif

            {{-- Title --}}
            @if ($title)
                <h1 class="font-serif text-4xl font-semibold leading-[1.1] {{ $titleClasses }} md:text-5xl lg:text-6xl">
                    {!! $title !!}
                </h1>
            @endif

            {{-- Lead --}}
            @if ($lead)
                <p class="mt-6 max-w-2xl font-sans text-base leading-relaxed {{ $leadClasses }} md:text-lg lg:text-xl">
                    {{ $lead }}
                </p>
            @endif

        </div>
    </div>
</header>
