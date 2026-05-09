{{--
    Component: x-social-link
    Round 40px disc icon button — used in footer.
    See DESIGN_SYSTEM.md §2.
    Props:
      - platform: 'ig' | 'fb' | 'yt' | 'tt' | 'sp'  (required)
      - href:     string                              (required)
      - tone:     'dark' | 'light'                    (default 'dark')
                  dark  = on noir bg → ivory icon, champagne hover
                  light = on ivory bg → noir icon, champagne hover
--}}
@props([
    'platform' => 'ig',
    'href' => '#',
    'tone' => 'dark',
])

@php
    $labels = [
        'ig' => 'Instagram',
        'fb' => 'Facebook',
        'yt' => 'YouTube',
        'tt' => 'TikTok',
        'sp' => 'Spotify',
    ];
    $label = $labels[$platform] ?? 'Social media';

    $base = 'inline-flex h-10 w-10 items-center justify-center rounded-full border transition-colors duration-150 ease-glam';

    $toneClasses = $tone === 'light'
        ? 'border-noir/15 text-noir hover:bg-champagne hover:text-noir hover:border-champagne'
        : 'border-ivory/20 text-ivory/85 hover:bg-champagne hover:text-noir hover:border-champagne';

    $classes = trim("{$base} {$toneClasses}");
@endphp

<a href="{{ $href }}"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="{{ $label }}"
   {{ $attributes->merge(['class' => $classes]) }}>

    @switch($platform)
        @case('ig')
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <rect x="3" y="3" width="18" height="18" rx="5"/>
                <circle cx="12" cy="12" r="4"/>
                <circle cx="17.5" cy="6.5" r="0.6" fill="currentColor" stroke="none"/>
            </svg>
            @break

        @case('fb')
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M13.4 21v-8.2h2.77l.41-3.21h-3.18V7.55c0-.93.26-1.56 1.59-1.56h1.68V3.13c-.29-.04-1.29-.13-2.45-.13-2.43 0-4.09 1.48-4.09 4.2v2.35H6.35v3.21h2.78V21h4.27z"/>
            </svg>
            @break

        @case('yt')
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M21.58 6.19a2.51 2.51 0 0 0-1.77-1.77C18.25 4 12 4 12 4s-6.25 0-7.81.42A2.51 2.51 0 0 0 2.42 6.19C2 7.75 2 12 2 12s0 4.25.42 5.81a2.51 2.51 0 0 0 1.77 1.77C5.75 20 12 20 12 20s6.25 0 7.81-.42a2.51 2.51 0 0 0 1.77-1.77C22 16.25 22 12 22 12s0-4.25-.42-5.81zM10 15.46V8.54L16 12l-6 3.46z"/>
            </svg>
            @break

        @case('tt')
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5.8 20.1a6.34 6.34 0 0 0 10.86-4.43V8.83a8.16 8.16 0 0 0 4.77 1.52V6.9a4.85 4.85 0 0 1-1.84-.21z"/>
            </svg>
            @break

        @case('sp')
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.59 14.42a.62.62 0 0 1-.86.21c-2.35-1.44-5.3-1.76-8.79-.97a.62.62 0 1 1-.28-1.21c3.81-.87 7.08-.5 9.71 1.11.3.18.39.58.21.86zm1.22-2.72a.78.78 0 0 1-1.07.26c-2.69-1.65-6.79-2.13-9.97-1.17a.78.78 0 1 1-.45-1.49c3.63-1.1 8.15-.57 11.23 1.33.37.22.48.7.26 1.07zm.1-2.83C14.69 8.95 9.38 8.78 6.26 9.73a.94.94 0 1 1-.54-1.79C9.3 6.85 15.17 7.06 18.91 9.27a.94.94 0 0 1-.95 1.61z"/>
            </svg>
            @break
    @endswitch
</a>
