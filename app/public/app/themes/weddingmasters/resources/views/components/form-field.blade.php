{{--
    Component: x-form-field
    Label + input/textarea, required mark, error slot.
    See DESIGN_SYSTEM.md §2.
    Props:
      - name:        string  REQUIRED
      - label:       string  REQUIRED
      - type:        'text'|'email'|'tel'|'date'|'textarea'   (default 'text')
      - required:    bool    (default false)
      - placeholder: string|null
      - value:       string  (default '')
      - error:       string|null  validation message; renders in red below input
      - autocomplete: string|null
--}}
@props([
    'name',
    'label',
    'type' => 'text',
    'required' => false,
    'placeholder' => null,
    'value' => '',
    'error' => null,
    'autocomplete' => null,
])

@php
    $base = 'w-full rounded-md border bg-white px-4 py-3 font-sans text-base text-noir placeholder:text-mute transition-colors duration-150 ease-glam focus:outline-none';
    $borderClass = $error
        ? 'border-red-500 focus:border-red-600'
        : 'border-line focus:border-champagne';
    $inputClasses = "{$base} {$borderClass}";
@endphp

<div>
    <label for="{{ $name }}"
           class="mb-2 block font-sans text-sm font-medium text-charcoal">
        {{ $label }}
        @if ($required)
            <span aria-hidden="true" class="ml-0.5 text-champagne">*</span>
        @endif
    </label>

    @if ($type === 'textarea')
        <textarea id="{{ $name }}"
                  name="{{ $name }}"
                  @if ($placeholder) placeholder="{{ $placeholder }}" @endif
                  @if ($required) required @endif
                  @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
                  rows="4"
                  class="{{ $inputClasses }} min-h-[140px] resize-y">{{ $value }}</textarea>
    @else
        <input type="{{ $type }}"
               id="{{ $name }}"
               name="{{ $name }}"
               value="{{ $value }}"
               @if ($placeholder) placeholder="{{ $placeholder }}" @endif
               @if ($required) required @endif
               @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
               class="{{ $inputClasses }}" />
    @endif

    @if ($error)
        <p class="mt-2 font-sans text-sm text-red-700" role="alert">{{ $error }}</p>
    @endif
</div>
