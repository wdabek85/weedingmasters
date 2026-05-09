{{--
    Section — Testimonialy / opinie par młodych
    Editorial pull-quote grid. bg-cream dla wizualnego oddechu od ivory.
    Mobile: 1-col stack. md: 2-col. lg+: 3-col.
--}}
@php
    $reviews = [
        [
            'quote' => 'Już o północy parkiet pełny, o piątej rano nikt nie chciał kończyć. Wiedzieli kiedy wejść z klubem, a kiedy posadzić wszystkich do biesiady.',
            'name' => 'Anna i Marek',
            'location' => 'Pałac Mortęgi',
            'date' => 'Lipiec 2025',
        ],
        [
            'quote' => 'Akordeon na żywo zrobił furorę u rodziny pana młodego. Goście do dziś o tym mówią. Profesjonalni i mega luzni — rzadka kombinacja.',
            'name' => 'Kasia i Jakub',
            'location' => 'Sala Pod Lipami',
            'date' => 'Wrzesień 2025',
        ],
        [
            'quote' => 'Harmonogram dopięty na ostatni guzik. Ani razu w trakcie wesela nie musieliśmy myśleć „co teraz". Po prostu bawiliśmy się.',
            'name' => 'Magda i Paweł',
            'location' => 'Folwark Hempel',
            'date' => 'Sierpień 2025',
        ],
    ];
@endphp

<section id="opinie" class="bg-cream py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- ============== Section heading ============== --}}
        <div class="mb-12 max-w-2xl md:mb-16">
            <x-eyebrow class="mb-5">Opinie</x-eyebrow>
            <h2 class="mb-5 font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                Nie wierzcie nam —<br>uwierzcie im.
            </h2>
            <p class="font-sans text-base leading-relaxed text-charcoal md:text-lg">
                To, co liczy się najbardziej, mówią pary po weselu.
                Kilka głosów stąd, kilka stamtąd — zawsze ten sam motyw.
            </p>
        </div>

        {{-- ============== Cards grid ============== --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 md:gap-6 lg:grid-cols-3">
            @foreach ($reviews as $r)
                <x-testimonial-card
                    :name="$r['name']"
                    :location="$r['location']"
                    :date="$r['date']"
                >
                    {{ $r['quote'] }}
                </x-testimonial-card>
            @endforeach
        </div>

    </div>
</section>
