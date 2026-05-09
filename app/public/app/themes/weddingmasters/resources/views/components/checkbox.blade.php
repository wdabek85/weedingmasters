{{--
    Component: x-checkbox
    Native checkbox visually replaced with custom box (champagne fill + ivory checkmark when checked).
    Label slot accepts inline links (e.g. RODO consent).
    See DESIGN_SYSTEM.md §2.
    Props:
      - name:     string  REQUIRED
      - value:    string  (default '1')
      - required: bool    (default false)
      - checked:  bool    (default false)
      - error:    string|null
--}}
@props([
    'name',
    'value' => '1',
    'required' => false,
    'checked' => false,
    'error' => null,
])

<div>
    <label class="group flex cursor-pointer items-start gap-3">
        <span class="relative mt-0.5 inline-flex h-5 w-5 shrink-0">
            <input type="checkbox"
                   id="{{ $name }}"
                   name="{{ $name }}"
                   value="{{ $value }}"
                   @if ($required) required @endif
                   @if ($checked) checked @endif
                   class="peer sr-only" />
            {{-- Visual box --}}
            <span aria-hidden="true"
                  class="block h-5 w-5 rounded-sm border border-line bg-white transition-colors duration-150 ease-glam peer-checked:border-champagne peer-checked:bg-champagne group-hover:border-champagne peer-focus:ring-2 peer-focus:ring-champagne/40"></span>
            {{-- Checkmark --}}
            <svg aria-hidden="true"
                 class="pointer-events-none absolute inset-0 m-auto h-3 w-3 text-noir opacity-0 transition-opacity duration-150 ease-glam peer-checked:opacity-100"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="5 12 10 17 19 8"/>
            </svg>
        </span>
        <span class="font-sans text-sm leading-snug text-charcoal">{{ $slot }}</span>
    </label>

    @if ($error)
        <p class="mt-2 font-sans text-sm text-red-700" role="alert">{{ $error }}</p>
    @endif
</div>
