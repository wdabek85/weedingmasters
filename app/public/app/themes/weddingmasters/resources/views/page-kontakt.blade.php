{{--
    Template: Kontakt (subpage)
    Layout (DS-020): page-header + asymmetric magazine spread —
      LEFT 30%  : form (cream card, scrolls with content, no sticky per user)
      RIGHT 70% : editorial — big serif statement + 1-2 paragraphs + signature avatars + channel ladder
    Mobile: editorial first (context), form second.
--}}
@extends('layouts.app')

@section('content')

    {{-- ============================== Page header ============================== --}}
    <x-page-header
        :breadcrumb="[
            ['label' => 'Strona główna', 'href' => '/'],
            ['label' => 'Kontakt'],
        ]"
        eyebrow="Kontakt"
        title="Porozmawiajmy<br>o Waszym weselu."
        lead="Odpowiadamy w ciągu 24h. Bez zobowiązań — najpierw poznajemy Wasze wesele, dopiero potem rozmawiamy o szczegółach."
        variant="dark"
        align="left"
    />

    {{-- ============================== Magazine spread ============================== --}}
    <section class="bg-ivory py-section-y md:py-section-y-lg">
        <div class="container-glam">

            <div class="grid gap-10 lg:grid-cols-[3fr_7fr] lg:gap-16">

                {{-- ============== LEFT 30% — Form (cream card) ============== --}}
                <div class="order-2 lg:order-1">
                    <div class="rounded-2xl border border-line bg-cream p-6 md:p-7 lg:sticky lg:top-28">
                        <div class="mb-6">
                            <x-eyebrow class="mb-3">Formularz</x-eyebrow>
                            <h3 class="font-serif text-2xl font-semibold leading-tight text-noir">
                                Zostaw ślad pisemny.
                            </h3>
                        </div>

                        <form action="#" method="post" class="flex flex-col gap-4" novalidate>
                            <x-form-field
                                name="name"
                                label="Jak się do Was zwracać?"
                                placeholder="Imię i nazwisko"
                                autocomplete="name"
                                :required="true" />

                            <x-form-field
                                name="contact"
                                label="E-mail lub telefon"
                                placeholder="Najlepiej oba"
                                autocomplete="email"
                                :required="true" />

                            <x-form-field
                                name="wedding_date"
                                label="Data wesela"
                                placeholder="DD.MM.RRRR" />

                            <x-form-field
                                name="location"
                                label="Gdzie?"
                                placeholder="Miasto, sala" />

                            <x-form-field
                                name="message"
                                type="textarea"
                                label="Co chcecie nam powiedzieć?"
                                placeholder="Liczba gości, styl wesela..." />

                            <x-checkbox name="rodo" :required="true" class="pt-1">
                                Wyrażam zgodę na przetwarzanie danych zgodnie z
                                <a href="/polityka-prywatnosci" class="underline decoration-champagne decoration-1 underline-offset-4 hover:text-noir transition-colors duration-150">Polityką prywatności</a>.
                            </x-checkbox>

                            <div class="pt-2">
                                <x-button as="button" type="submit" variant="primary" :block="true">
                                    Wyślij zapytanie
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- ============== RIGHT 70% — Editorial ============== --}}
                <div class="order-1 lg:order-2">

                    {{-- Eyebrow --}}
                    <x-eyebrow class="mb-6">List od nas</x-eyebrow>

                    {{-- Big serif statement --}}
                    <h2 class="mb-8 font-serif text-4xl font-semibold leading-[1.05] text-noir md:text-5xl lg:text-6xl">
                        Najpierw rozmowa,<br>potem reszta.
                    </h2>

                    {{-- Body --}}
                    <div class="max-w-2xl space-y-5 font-sans text-base leading-relaxed text-charcoal md:text-lg">
                        <p>
                            Każdą wiadomość czytamy osobiście. Zanim cokolwiek ustalimy,
                            chcemy poznać Wasze wesele — kiedy, gdzie, dla kogo, w jakim klimacie.
                            Na pierwsze pytania nie potrzebujemy spotkania — wystarczy krótka wiadomość.
                        </p>
                        <p>
                            Najszybciej znajdziecie nas na <a href="https://wa.me/48123456789" target="_blank" rel="noopener noreferrer" class="font-medium text-noir underline decoration-champagne decoration-1 underline-offset-4 hover:decoration-2">WhatsAppie</a>.
                            Wolicie zadzwonić — proszę bardzo. Wolicie napisać dłużej —
                            obok jest formularz. Tylko nie zwlekajcie z najlepszymi terminami.
                        </p>
                    </div>

                    {{-- Signature with overlapping avatars --}}
                    <div class="mt-10 flex items-center gap-4">
                        <div class="flex shrink-0 -space-x-2.5">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-champagne font-serif text-base font-semibold text-noir ring-[3px] ring-ivory">
                                M
                            </span>
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-noir font-serif text-base font-semibold text-ivory ring-[3px] ring-ivory">
                                T
                            </span>
                        </div>
                        <span class="font-serif text-lg italic text-charcoal">— [Imię] + [Imię]</span>
                    </div>

                    {{-- Channel ladder --}}
                    <div class="mt-14 max-w-2xl">

                        <div class="mb-5 flex items-baseline justify-between">
                            <x-eyebrow tone="mute">Lub szybciej</x-eyebrow>
                            <span class="font-sans text-xs text-mute">Wybierz, co Wam wygodniej.</span>
                        </div>

                        <div class="border-t border-line">
                            @php
                                $channels = [
                                    [
                                        'label' => 'WhatsApp',
                                        'sub' => 'Najszybszy kanał — odpowiadamy w minutach',
                                        'href' => 'https://wa.me/48123456789',
                                        'external' => true,
                                        'icon' => 'whatsapp',
                                    ],
                                    [
                                        'label' => 'Zadzwoń',
                                        'sub' => '+48 123 456 789 · godziny 9–21',
                                        'href' => 'tel:+48123456789',
                                        'external' => false,
                                        'icon' => 'phone',
                                    ],
                                    [
                                        'label' => 'Instagram DM',
                                        'sub' => '@weddingmasters',
                                        'href' => 'https://instagram.com/weddingmasters',
                                        'external' => true,
                                        'icon' => 'instagram',
                                    ],
                                    [
                                        'label' => 'Email',
                                        'sub' => 'kontakt@weddingmasters.pl · odpowiedź w 24h',
                                        'href' => 'mailto:kontakt@weddingmasters.pl',
                                        'external' => false,
                                        'icon' => 'mail',
                                    ],
                                ];
                            @endphp

                            @foreach ($channels as $ch)
                                <a href="{{ $ch['href'] }}"
                                   @if ($ch['external']) target="_blank" rel="noopener noreferrer" @endif
                                   class="group flex items-center gap-5 border-b border-line py-5 transition-colors duration-150 ease-glam hover:bg-cream/50">

                                    {{-- Icon disc --}}
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-noir text-ivory transition-colors duration-150 ease-glam group-hover:bg-champagne group-hover:text-noir">
                                        @switch($ch['icon'])
                                            @case('phone')
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                                </svg>
                                                @break
                                            @case('whatsapp')
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.71.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0 0 20.464 3.488"/>
                                                </svg>
                                                @break
                                            @case('instagram')
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                                                </svg>
                                                @break
                                            @case('mail')
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                                    <polyline points="22 6 12 13 2 6"/>
                                                </svg>
                                                @break
                                        @endswitch
                                    </span>

                                    {{-- Label + sub --}}
                                    <div class="flex flex-1 flex-col">
                                        <strong class="font-serif text-lg font-semibold leading-tight text-noir transition-colors duration-150 ease-glam group-hover:text-charcoal md:text-xl">
                                            {{ $ch['label'] }}
                                        </strong>
                                        <span class="font-sans text-sm leading-snug text-charcoal">
                                            {{ $ch['sub'] }}
                                        </span>
                                    </div>

                                    {{-- Arrow --}}
                                    <span aria-hidden="true" class="text-mute transition-all duration-150 ease-glam group-hover:translate-x-1 group-hover:text-champagne">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"/>
                                            <polyline points="12 5 19 12 12 19"/>
                                        </svg>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
