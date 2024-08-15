@extends("layouts.app")

@push("styles")
    <link rel="stylesheet" href=@vite("resources/css/welcome.css")
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

    {{-- Pourquoi-nous --}}
    @include('partials.welcome.why-us')
@endsection
