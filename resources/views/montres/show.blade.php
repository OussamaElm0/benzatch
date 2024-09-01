@extends('layouts.app')

@push('scripts')
    @vite("resources/js/addToCart.js")
    <script>
        function increment(){
            let quantityInput = document.getElementById('qte');
            quantityInput.value = parseInt(quantityInput.value) + 1;
            console.log(quantityInput.value);
        }

        function decrement(){
            let quantityInput = document.getElementById('qte');
            if(quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
            console.log(quantityInput.value);
        }

        $(document).ready(function(){
            $('.slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2500,
                arrows: false,
                dots: true,
            });

            $('.montre-images').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
                arrows: false,
                dots: false,
            });
        });
    </script>
@endpush

@section('title', $montre->serial_number)

@section('content')
    <section class="flex flex-col p-4 bg-gray items-center">
        <article class="grid grid-cols-2 mobile:grid-cols-1 gap-4 mobile:gap-5 m-4 mobile:m-0 p-8 w-3/4 mobile:w-10/12 h-96 mobile:h-auto border-black border-2 bg-[#FFF] rounded">
            <div class="w-full h-full slider">
                @foreach($montre->images as $image)
                    <img
                        src="{{ asset('storage/' . $image) }}"
                        alt="{{ $montre->serial_number . '-' . $loop->iteration }}"
                        class="h-60 w-full object-contain"
                    />
                @endforeach
            </div>

            <div class="flex flex-col gap-2 relative mobile:h-auto">
                <h1 class="font-semibold sm:text-3xl mobile:text-2xl">
                    {{ $montre->description }}
                    @if($montre->reduction > 0)
                        <span class="text-red-600">
                            -{{ $montre->reduction }}%
                        </span>
                    @endif
                </h1>
                <div class="flex gap-3 text-xl font-semibold">
                    Color: <span class="bg-{{ lcfirst($montre->color) }} w-8 h-8"></span>
                </div>
                <h3 class="text-2xl font-semibold">
                    @if($montre->reduction > 0)
                        <span class=" font-normal line-through">
                            {{ $montre->prix }}
                        </span>
                        {{ $montre->prix * (1 - $montre->reduction / 100) }}
                    @else
                        {{ $montre->prix }}
                    @endif
                    MAD
                </h3>
                <div class="flex flex-col gap-3 w-full items-center absolute mobile:relative bottom-0">
                    <div class="flex flex-row flex-nowrap gap-3 w-full justify-center">
                        <button onclick="decrement()" class="w-1/5 bg-gold text-black p-1 rounded text-xl mobile:text-l">
                            -
                        </button>
                        <input id="qte" type="number" value="1" min="1" readonly
                               class="text-center w-3/5 text-l rounded">
                        <button onclick="increment()" class="w-1/5 bg-gold text-black p-1 rounded text-xl">
                            +
                        </button>
                    </div>
                    <button type="button" data-id="{{ $montre->id }}" data-url="{{ route('cart.addToCart') }}"
                            class="add-to-cart w-full text-black bg-gold p-2 text-xl rounded hover:bg-black hover:text-gold"
                    >
                        Ajouter Au Panier
                    </button>
                </div>
            </div>
        </article>
        <article class="flex flex-col gap-5 p-4 text-l">
            <h1 class="uppercase title place-self-center font-semibold tracking-widest text-xl sm:text-2xl">
                Vous aimerez peut-être aussi
            </h1>
            <div class="grid mobile:grid-cols-1 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 h-auto gap-8">
                @foreach($similars as $montre)
                    <x-cards.montre
                        :$montre
                        @class("border-2 border-black")
                    />
                @endforeach
            </div>
        </article>
    </section>

    {{-- Why US --}}
    @include('partials.welcome.why-us')
@endsection
