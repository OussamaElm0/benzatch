@extends("layouts.app")

@push("scripts")
    <script src="@vite('resources/js/sort-by.js')" type="text/javascript"></script>
@endpush

@section('title','Montres')

@section("content")
    <section class="flex p-4 flex-col">
        <h1 class="uppercase title place-self-center text-xl sm:text-2xl tracking-widest">
            nos montres
        </h1>
        <div class="flex justify-between p-5">
            <h3 class="sm:font-semibold text-xl sm:text-2xl">
                {{ __($category) }}
            </h3>
            @include('partials.montres.sort-by')
        </div>
    </section>
@endsection
