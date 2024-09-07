@extends("layouts.app")

@push("styles")
    <link rel="stylesheet" href=@vite("resources/css/welcome.css")
@endpush

@push("scripts")
    @vite("resources/js/typed.js")
    @vite("resources/js/slick-slider.js")
    @vite('resources/js/addToCart.js')
@endpush

@section("title","Home")

@section("content")
    {{--  Hero  --}}
    @include("partials.welcome.hero")

    {{-- Marques --}}
    @include('partials.welcome.marques')

    {{-- Collections --}}
    @include('partials.welcome.collections')

    {{-- Promostions en cours --}}
    @include('partials.welcome.promotions')

    {{-- Best Sellers --}}
    @include('partials.welcome.best-sellers')

    {{-- Pourquoi-nous --}}
    @include('partials.welcome.why-us')
@endsection
