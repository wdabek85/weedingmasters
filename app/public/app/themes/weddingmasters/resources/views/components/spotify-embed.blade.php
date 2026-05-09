{{--
    Component: x-spotify-embed
    Wrapped Spotify iframe (playlist embed). Lazy loaded.
    See DESIGN_SYSTEM.md §2.
    Props:
      - playlist: string  REQUIRED — Spotify playlist ID (the bit after /playlist/ in URL)
      - height:   int     (default 352)
      - title:    string  iframe accessible title (default 'Spotify playlist')
--}}
@props([
    'playlist' => '',
    'height' => 352,
    'title' => 'Spotify playlist',
])

@if ($playlist)
    <div {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl shadow-md']) }}>
        <iframe
            src="https://open.spotify.com/embed/playlist/{{ $playlist }}?utm_source=generator"
            width="100%"
            height="{{ $height }}"
            frameborder="0"
            style="border: 0;"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            allowfullscreen
            loading="lazy"
            title="{{ $title }}">
        </iframe>
    </div>
@endif
