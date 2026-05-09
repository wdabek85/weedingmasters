{{--
    Section 07 — Jak pracujemy
    Wireframe ref: §07. Wireframe defines content/intent, not visual.
    Concept B (refined numerals) in horizontal stepper layout (DS-011 + DS-012):
      mobile : 1 col stack
      md     : 2×2
      lg+    : 4 cols single row, champagne hairline connectors between numerals
    Copy shortened to parallel one-liners — process should *sell simplicity*.
--}}
@php
    $steps = [
        [
            'number' => '01',
            'title' => 'Piszecie do nas',
            'description' => 'Sprawdzamy termin i umawiamy rozmowę. Bez zobowiązań.',
        ],
        [
            'number' => '02',
            'title' => 'Poznajemy się',
            'description' => 'Słuchamy Waszej wizji wesela. Doradzamy, nie narzucamy.',
        ],
        [
            'number' => '03',
            'title' => 'Planujemy razem',
            'description' => 'Konkretny harmonogram, repertuar, zabawy. Bez niespodzianek.',
        ],
        [
            'number' => '04',
            'title' => 'Bawicie się, my ogarniamy',
            'description' => 'Sala, fotograf, oświetlenie, kolejność zabaw — to nasza działka.',
        ],
    ];
@endphp

<section id="jak-pracujemy" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- Section heading --}}
        <div class="mb-12 max-w-2xl md:mb-16">
            <x-eyebrow class="mb-5">Jak pracujemy</x-eyebrow>
            <h2 class="font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                Od pierwszego kontaktu<br>do ostatniego tańca.
            </h2>
        </div>

        {{-- Steps grid --}}
        <div class="grid grid-cols-1 gap-y-12 md:grid-cols-2 md:gap-x-10 md:gap-y-14 lg:grid-cols-4 lg:gap-x-8">
            @foreach ($steps as $step)
                <x-step
                    :number="$step['number']"
                    :title="$step['title']"
                    :last="$loop->last"
                >
                    {{ $step['description'] }}
                </x-step>
            @endforeach
        </div>
    </div>
</section>
