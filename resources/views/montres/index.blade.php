@extends("layouts.app")

@push("scripts")
    @vite('resources/js/sort-by.js')
    @vite('resources/js/slick-slider.js')
    @vite('resources/js/addToCart.js')
@endpush

@section('title','Montres')

@section("content")
    <section class="bg-gray">
        <article class="flex p-4 flex-col">
            <h1 class="uppercase title place-self-center text-xl sm:text-2xl tracking-widest">
                nos montres
            </h1>
            <div class="flex justify-between p-5 mobile:flex-col mobile:gap-6">
                <h3 class="sm:font-semibold text-xl sm:text-2xl">
                    {{ ucfirst(__($category)) }}
                </h3>
                @include('partials.montres.sort-by')
            </div>
        </article>

        {{-- Montres --}}

        {{-- Check if t --}}
        @if (count($montres) !== 0)
            <article class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 gap-y-8 sm:gap-12 p-4">
                @foreach($montres as $montre)
                    <x-cards.montre :$montre class="col-span-1 border-black border" />
                @endforeach
            </article>
            <div class="p-8">
                {{ $montres->links() }}
            </div>
        @else
            <h1 class="w-full p-8 text-center text-xl sm:text-2xl font-semibold">
                Désolé, aucune montre n'est disponible dans cette catégorie.
            </h1>
        @endif
    </section>
@endsection
