{{--
    Section 09 — FAQ
    Wireframe ref: §09. UX pattern: 2-col split on lg+ (heading left, accordion right) — see DS-016.
    Wireframe truncated answers (other than #1) — written in here as MVP placeholders consistent
    with the duo's tone-of-voice; easy to swap later via ACF.
--}}
@php
    $faqs = [
        [
            'q' => 'Czy można przygotować listę piosenek?',
            'a' => 'Tak, i mocno do tego zachęcamy. Wysyłajcie listę „must play" (co MUSI zagrać) i listę „nie chcemy" (czego unikamy). Resztę dobieramy na bieżąco — ale zawsze w granicach Waszego gustu.',
        ],
        [
            'q' => 'Jak wygląda plan wesela?',
            'a' => 'Ustalamy go razem na drugim spotkaniu — przechodzimy przez cały wieczór godzina po godzinie. Pierwszy taniec, oczepiny, zabawy, zmiany muzyczne, pauzy. Dostajecie konkretny harmonogram, który dogadujemy też z salą i fotografem.',
        ],
        [
            'q' => 'Jakie zabawy i oczepiny prowadzicie?',
            'a' => 'Mamy bazę sprawdzonych zabaw, ale zawsze dobieramy je do gości i nastroju wieczoru. Bez konkursów na siłę, bez „pojedynków pań i panów" jeśli tego nie chcecie. Wszystko ustalamy z Wami przed weselem.',
        ],
        [
            'q' => 'Co jeśli sprzęt ulegnie awarii?',
            'a' => 'Mamy backup na każdy element kluczowego sprzętu — drugi laptop, zapasowy mikser, dodatkowe mikrofony, dodatkowe kable. Awaria nie zatrzyma muzyki nawet na minutę.',
        ],
        [
            'q' => 'Ile czasu potrzebujecie na rozstawienie?',
            'a' => 'Standardowo 2–3 godziny przed planowanym pierwszym tańcem. Zostawiamy zapas na próbę dźwięku, ustawienie świateł i koordynację z resztą obsługi sali.',
        ],
        [
            'q' => 'Czy gracie poza Kielcami i Katowicami?',
            'a' => 'Tak, gramy w całej Polsce. Dojazd ustalamy indywidualnie — w cenie pakietu weselnego mieszczą się standardowe odległości, dalsze trasy uzgadniamy oddzielnie.',
        ],
        [
            'q' => 'Jak długo gracie? Co z przedłużeniem?',
            'a' => 'Standardowy pakiet weselny to gra od pierwszego tańca do około 3–4 nad ranem. Przedłużenie jest możliwe — wystarczy nas o tym poinformować odpowiednio wcześniej, najlepiej tego samego wieczoru.',
        ],
    ];
@endphp

<section id="faq" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        <div class="grid items-start gap-10 lg:grid-cols-[5fr_7fr] lg:gap-16">

            {{-- ============== Heading column ============== --}}
            <div class="lg:sticky lg:top-28">
                <x-eyebrow class="mb-5">FAQ</x-eyebrow>
                <h2 class="mb-5 font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                    Pytania,<br>które słyszymy najczęściej
                </h2>
                <p class="max-w-md font-sans text-base leading-relaxed text-charcoal">
                    Nie znalazłeś tego, czego szukasz?
                    <a href="#kontakt" class="underline decoration-champagne decoration-1 underline-offset-4 hover:text-noir transition-colors duration-150">
                        Napisz do nas
                    </a> — odpowiemy w 24h.
                </p>
            </div>

            {{-- ============== Accordion column ============== --}}
            <div>
                <x-accordion>
                    @foreach ($faqs as $faq)
                        <x-accordion-item :question="$faq['q']" :open="$loop->first">
                            {{ $faq['a'] }}
                        </x-accordion-item>
                    @endforeach
                </x-accordion>
            </div>
        </div>
    </div>
</section>
