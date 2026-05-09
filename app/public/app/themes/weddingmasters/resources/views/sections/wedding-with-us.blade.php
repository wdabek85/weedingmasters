{{--
    Section 05 — Jak wygląda wesele z nami
    Wireframe ref: §05. Redesigned per DS-030 — paired rows:
      Each of 3 paragraphs is paired in a 2-col row with its corresponding icon-row highlight.
      Rows separated by hairline border-bottom (last row no border).
      Photo dropped — was source of conflict in v3 (banner = dominant) and v4 (sidebar = imbalanced).
    Hidden review-box: structurally noted as comment.
--}}
<section id="jak-wyglada" class="bg-ivory py-section-y md:py-section-y-lg">
    <div class="container-glam">

        {{-- Heading --}}
        <div class="mb-12 max-w-2xl md:mb-16">
            <x-eyebrow class="mb-5">Z nami</x-eyebrow>
            <h2 class="font-serif text-3xl font-semibold leading-[1.15] text-noir md:text-4xl">
                Jak wygląda wesele z nami
            </h2>
        </div>

        {{-- ============== Paired rows: paragraph + corresponding highlight ============== --}}
        <div>

            {{-- Row 1 --}}
            <div class="grid items-start gap-8 border-b border-line py-10 lg:grid-cols-12 lg:gap-16 lg:py-12">
                <p class="font-sans text-base leading-relaxed text-charcoal md:text-lg lg:col-span-7">
                    Gramy to, co kochacie Wy i to, do czego tańczą Wasi goście. Dziadek usłyszy
                    swoje ulubione przeboje, znajomi z uczelni najnowsze hity, a kiedy
                    wyciągamy akordeon — wstają wszyscy.
                </p>
                <div class="lg:col-span-5 lg:pt-1">
                    <x-icon-row
                        title="Muzyka pod każde pokolenie"
                        description="Od klasycznych przebojów po najnowsze hity">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 18V5l12-2v13"/>
                            <circle cx="6" cy="18" r="3"/>
                            <circle cx="18" cy="16" r="3"/>
                        </svg>
                    </x-icon-row>
                </div>
            </div>

            {{-- Row 2 --}}
            <div class="grid items-start gap-8 border-b border-line py-10 lg:grid-cols-12 lg:gap-16 lg:py-12">
                <p class="font-sans text-base leading-relaxed text-charcoal md:text-lg lg:col-span-7">
                    Jeden z nas jest przy konsoli, drugi jest z Wami na sali — prowadzi
                    zabawy, łapie energię gości i pilnuje, żeby nikt nie siedział za długo
                    przy stole. <strong class="font-semibold text-noir">Bez żenujących konkursów.</strong>
                    Z humorem i wyczuciem.
                </p>
                <div class="lg:col-span-5 lg:pt-1">
                    <x-icon-row
                        title="Zabawa bez żenady"
                        description="Z humorem, bez sztucznych konkursów">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                            <path d="M5 3v4"/>
                            <path d="M19 17v4"/>
                            <path d="M3 5h4"/>
                            <path d="M17 19h4"/>
                        </svg>
                    </x-icon-row>
                </div>
            </div>

            {{-- Row 3 --}}
            <div class="grid items-start gap-8 py-10 lg:grid-cols-12 lg:gap-16 lg:py-12">
                <p class="font-sans text-base leading-relaxed text-charcoal md:text-lg lg:col-span-7">
                    W tle ogarniamy resztę: harmonogram z obsługą sali, synchronizację
                    z fotografem, oświetlenie dopasowane do momentu.
                    <strong class="font-semibold text-noir">Wy tego nie widzicie i o to chodzi.</strong>
                </p>
                <div class="lg:col-span-5 lg:pt-1">
                    <x-icon-row
                        title="Wszystko ogarnięte w tle"
                        description="Sala, fotograf, harmonogram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </x-icon-row>
                </div>
            </div>
        </div>

        {{-- Hidden review-box slot (DS-004) — uncomment when reviews land --}}
        {{-- <div class="mt-14 rounded-2xl border border-line bg-cream p-8 md:p-10">[review carousel]</div> --}}

    </div>
</section>
