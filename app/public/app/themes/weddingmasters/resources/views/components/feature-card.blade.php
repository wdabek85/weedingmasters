{{--
    Component: x-feature-card
    Dark glamour card per DS-024 — bg-charcoal + ivory text. Stoi na ivory section
    (features) jako "ciemna fotografia na jasnym papierze".
    See DESIGN_SYSTEM.md §2.
    Props:
      - title: string  REQUIRED
      - default slot = description body (HTML allowed; <strong> auto-styled ivory)
      - named slot `icon` = SVG (champagne via currentColor w noir disc)
--}}
@props([
    'title' => '',
])

<article {{ $attributes->merge([
    'class' => 'group flex h-full flex-col rounded-2xl border border-ivory/10 bg-charcoal p-7 transition-all duration-300 ease-glam hover:-translate-y-0.5 hover:border-champagne/40 hover:shadow-lg md:p-8',
]) }}>

    @isset($icon)
        <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-full bg-noir text-champagne transition-colors duration-300 ease-glam group-hover:bg-champagne group-hover:text-noir">
            {{ $icon }}
        </div>
    @endisset

    <h3 class="mb-3 font-serif text-2xl font-semibold leading-tight text-ivory">
        {{ $title }}
    </h3>

    <div class="font-sans text-base leading-relaxed text-ivory/75 [&_strong]:font-semibold [&_strong]:text-ivory">
        {{ $slot }}
    </div>
</article>
