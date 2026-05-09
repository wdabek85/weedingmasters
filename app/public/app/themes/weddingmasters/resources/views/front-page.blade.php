{{--
    Template: Front Page (Home)
    Sections per DESIGN_SYSTEM.md §4.
--}}
@extends('layouts.app')

@section('content')
    @include('sections.hero')
    @include('sections.features')

    <x-marquee tone="dark" :items="[
        'Wesela',
        'Studniówki',
        'Eventy firmowe',
        '18-tki',
        'Akordeon na żywo',
        'DJ duo',
        'Pełen parkiet do rana',
    ]" />

    @include('sections.offers')
    @include('sections.wedding-with-us')
    @include('sections.gallery')
    @include('sections.process')
    @include('sections.about')
    @include('sections.testimonials')
    @include('sections.faq')
    @include('sections.contact-form')
@endsection
