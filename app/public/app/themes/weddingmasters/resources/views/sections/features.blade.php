{{--
    Section 03 — Wyróżniki / Co dostajecie z nami
    Editorial: ciemne karty (bg-charcoal) na jasnym tle sekcji — ostra cezura
    po dark hero, kart-y zostają w premium glamour vocabulary.
--}}
<section id="wyrozniki" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- ============== Top split: heading (left) + visual (right) ==============
             Heading + custom-drawn moodboard panel z winylem zamiast stock photo. --}}
        <div class="mb-12 grid items-end gap-10 md:mb-16 lg:grid-cols-12 lg:gap-16">

            {{-- Heading (col-span-5 lg+) --}}
            <div class="lg:col-span-5">
                <x-eyebrow class="mb-5">Wyróżniki</x-eyebrow>
                <h2 class="font-serif text-3xl font-semibold leading-[1.1] text-noir md:text-4xl lg:text-5xl">
                    Co dostajecie<br>
                    <span class="text-mute">z nami</span><span class="text-champagne">.</span>
                </h2>
            </div>

            {{-- Visual (col-span-7 lg+) — moodboard z winylem (brand-relevant SVG) --}}
            <figure class="relative isolate aspect-[16/10] overflow-hidden rounded-2xl bg-noir shadow-md lg:col-span-7">
                {{-- Moodboard radial gradient (gold accent) --}}
                <div aria-hidden="true" class="absolute inset-0" style="background:
                    radial-gradient(ellipse 70% 60% at 70% 25%, rgba(201,169,97,0.45), transparent 60%),
                    radial-gradient(ellipse 50% 45% at 25% 75%, rgba(168,139,63,0.35), transparent 55%),
                    radial-gradient(ellipse 30% 30% at 50% 45%, rgba(255,225,165,0.20), transparent 60%),
                    #0A0A0A;"></div>

                {{-- Film grain (spójne z resztą placeholderów) --}}
                <div aria-hidden="true" class="absolute inset-0 opacity-[0.04] mix-blend-overlay"
                     style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22/></filter><rect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/></svg>'); background-size: 220px 220px;"></div>

                {{-- Vinyl record SVG — koncentryczne champagne grooves --}}
                <div class="relative flex h-full w-full items-center justify-center">
                    <svg viewBox="0 0 200 200" class="h-3/4 max-h-72 w-auto text-champagne opacity-85"
                         fill="none" stroke="currentColor" stroke-width="0.6" aria-hidden="true">
                        <circle cx="100" cy="100" r="90"/>
                        <circle cx="100" cy="100" r="78"/>
                        <circle cx="100" cy="100" r="66"/>
                        <circle cx="100" cy="100" r="54"/>
                        <circle cx="100" cy="100" r="42"/>
                        <circle cx="100" cy="100" r="30"/>
                        <circle cx="100" cy="100" r="18" stroke-width="1.2"/>
                        <circle cx="100" cy="100" r="5" fill="currentColor" stroke="none"/>
                    </svg>
                </div>

                {{-- Bottom gradient dla głębi --}}
                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-noir/35 via-transparent to-transparent"></div>
            </figure>
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
