{{--
    Section 03 — Wyróżniki / Co dostajecie z nami
    Editorial: ciemne karty (bg-charcoal) na jasnym tle sekcji — ostra cezura
    po dark hero, kart-y zostają w premium glamour vocabulary.
--}}
<section id="wyrozniki" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- Heading + maleńka disco-ball ornament (lg+ only) po prawej --}}
        <div class="mb-12 flex items-end justify-between gap-10 md:mb-16">
            <div class="max-w-2xl">
                <x-eyebrow class="mb-5 inline-flex items-center gap-2">
                    <span aria-hidden="true" class="inline-block h-1.5 w-1.5 rounded-full bg-champagne"></span>
                    Wyróżniki
                </x-eyebrow>
                <h2 class="font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                    Co dostajecie z nami
                </h2>
            </div>

            {{-- Logo accent (do podglądu) — wersja z footera, przesunięta 10% od prawej --}}
            <img src="{{ get_theme_file_uri('resources/images/logoweddingmasters.png') }}"
                 alt=""
                 class="hidden h-20 shrink-0 object-contain mr-[10%] lg:block xl:h-24" />
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 lg:gap-6">

            <x-feature-card title="Jeden gra, drugi prowadzi"
>
                <x-slot:icon>
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                        <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3v5z"/>
                        <path d="M3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3v5z"/>
                    </svg>
                </x-slot:icon>
                Kiedy DJ stoi za konsoletą, wodzirej jest z Wami na sali — prowadzi zabawy,
                czyta gości, reaguje <strong>na bieżąco</strong>. <strong>Bez przestojów</strong>,
                bez momentów ciszy.
            </x-feature-card>

            <x-feature-card title="Akordeon, który rozkręca salę"
>
                <x-slot:icon>
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M9 18V5l12-2v13"/>
                        <circle cx="6" cy="18" r="3"/>
                        <circle cx="18" cy="16" r="3"/>
                    </svg>
                </x-slot:icon>
                Wychodzimy <strong>z muzyką między gości</strong>. Biesiada na żywo,
                przy której wstają <strong>nawet ci</strong>, którzy cały wieczór
                siedzieli przy stole.
            </x-feature-card>

            <x-feature-card title="Dogadujemy się z resztą obsługi"
>
                <x-slot:icon>
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="18" cy="5" r="3"/>
                        <circle cx="6" cy="12" r="3"/>
                        <circle cx="18" cy="19" r="3"/>
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                    </svg>
                </x-slot:icon>
                Fotograf, fontanna iskier, sala — synchronizujemy się tak, żeby
                <strong>każdy moment trafił idealnie</strong>. Wy nie musicie ogarniać,
                <strong>kogo o czym poinformować</strong>.
            </x-feature-card>
        </div>
    </div>
</section>
