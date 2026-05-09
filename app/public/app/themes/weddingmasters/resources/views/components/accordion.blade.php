{{--
    Component: x-accordion
    Wrapper for x-accordion-item rows. Adds top hairline so the first item also has a top border.
    See DESIGN_SYSTEM.md §2.
    Props: none — slot only.
--}}
<div {{ $attributes->merge(['class' => 'border-t border-line']) }}>
    {{ $slot }}
</div>
