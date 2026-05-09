{{--
    Section 10 — CTA + Formularz (Kontakt)
    Wireframe ref: §10. Layout: heading top + 2-col grid (form 1.4fr / info+map 1fr).
    Form is presentational only in MVP — backend handler will be wired post-ACF (DS-005).
--}}
@php
    $tel = '+48 123 456 789';
    $telClean = '+48123456789';
    $email = 'kontakt@weddingmasters.pl';
    $whatsappUrl = 'https://wa.me/' . ltrim($telClean, '+');
@endphp

<section id="kontakt" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- Section heading --}}
        <div class="mb-12 max-w-3xl md:mb-16">
            <x-eyebrow class="mb-5">Kontakt</x-eyebrow>
            <h2 class="mb-5 font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                Porozmawiajmy<br>o Waszym weselu.
            </h2>
            <p class="font-sans text-base leading-relaxed text-charcoal md:text-lg">
                Odpowiadamy w ciągu 24h. Bez zobowiązań — najpierw poznajemy Wasze wesele,
                dopiero potem rozmawiamy o szczegółach.
            </p>
        </div>

        {{-- 2-col grid: form + info --}}
        <div class="grid items-start gap-12 lg:grid-cols-[1.4fr_1fr] lg:gap-16">

            {{-- ============== Form ============== --}}
            <form action="#"
                  method="post"
                  class="flex flex-col gap-5"
                  novalidate>

                <x-form-field
                    name="name"
                    label="Jak się do Was zwracać?"
                    placeholder="Imię i nazwisko"
                    autocomplete="name"
                    :required="true" />

                <x-form-field
                    name="contact"
                    label="E-mail lub telefon"
                    placeholder="Najlepiej oba — odpowiemy szybciej"
                    autocomplete="email"
                    :required="true" />

                <x-form-field
                    name="wedding_date"
                    label="Data wesela"
                    placeholder="DD.MM.RRRR (lub: jeszcze nie ustaliliśmy)" />

                <x-form-field
                    name="location"
                    label="Gdzie odbędzie się wesele?"
                    placeholder="Miasto, sala, region" />

                <x-form-field
                    name="message"
                    type="textarea"
                    label="Co chcecie nam powiedzieć?"
                    placeholder="Liczba gości, styl wesela, czego oczekujecie..." />

                <x-checkbox name="rodo" :required="true" class="pt-1">
                    Wyrażam zgodę na przetwarzanie danych osobowych w celu odpowiedzi na zapytanie.
                    <a href="/polityka-prywatnosci" class="underline decoration-champagne decoration-1 underline-offset-4 hover:text-noir transition-colors duration-150">Polityka prywatności</a>.
                </x-checkbox>

                <div class="pt-2">
                    <x-button as="button" type="submit" variant="primary">
                        Wyślij zapytanie
                    </x-button>
                </div>
            </form>

            {{-- ============== Info + Map ============== --}}
            <aside class="flex flex-col gap-5">
                <x-contact-row
                    label="{{ $tel }}"
                    sub="Zadzwoń — godziny 9–21"
                    href="tel:{{ $telClean }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                </x-contact-row>

                <x-contact-row
                    label="{{ $email }}"
                    sub="Odpowiadamy w 24h"
                    href="mailto:{{ $email }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <polyline points="22 6 12 13 2 6"/>
                    </svg>
                </x-contact-row>

                <x-contact-row
                    label="WhatsApp"
                    sub="Najszybszy kanał kontaktu"
                    :href="$whatsappUrl">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.71.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0 0 20.464 3.488"/>
                    </svg>
                </x-contact-row>

                <x-map-placeholder caption="Gramy w całej Polsce." class="mt-3" />
            </aside>
        </div>
    </div>
</section>
