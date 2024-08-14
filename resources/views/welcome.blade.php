@extends("layouts.app")

@push("styles")
    <link rel="stylesheet" href=@vite("resources/css/welcome.css")
@endpush

@section("title","Home")

@section("content")
    <section class="grid grid-cols-1 md:grid-cols-2 bg-black p-8 h-auto md:h-[500px]">
        <div class="flex flex-col gap-8">
            <h1 class="font-cormorant text-white text-center md:place-self-center font-bold text-5xl md:text-9xl">
                Benzatch.
            </h1>
            <h3 class="text-gold font-poppins text-2xl md:text-4xl tracking-widest text-center md:place-self-center">
                LE TEMPS EST UN LUXE
            </h3>
            <p class="slogan h-[50px] text-gold opacity-80 text-center md:place-self-center w-auto lg:w-96 text-xl md:text-2xl font-poppins font-light white">
            </p>
            <a
                href="#"
                class="block mx-auto md:inset-x-1/4 flex items-center justify-center text-center bg-gold text-black w-56 h-10 rounded font-semibold hover:bg-black hover:text-gold hover:border-gold hover:border-2"
            >
                Découvrez nos offres
            </a>
        </div>
        <img
            src="{{ asset("images/hero-watch.png") }}"
            alt="Montre"
            class="w-auto h-3/5 mx-auto md:mx-32 mobile:hidden"
        />
    </section>

    {{-- Marque --}}
    <section class="bg-gray text-black flex sm:h-44 flex-col p-4 text-l sm:text-2xl">
        <h1 class="marques uppercase title place-self-center tracking-widest">
            nos marques
        </h1>
        <div class="marques-slider px-8 mt-8 flex items-center justify-center gap-8">
            @foreach($marques as $brand)
                <a href="{{ route('marques.products', $brand) }}" class="whitespace-nowrap w-1/4 text-center text-black hover:text-red-500 transition-colors duration-300">
                    {{ $brand }}
                </a>
            @endforeach
        </div>
    </section>

    {{-- Collections --}}
    <section class="bg-gold text-black flex flex-col gap-4 p-4 text-l sm:text-2xl">
        <h1 class="collections uppercase title place-self-center tracking-widest">
            nos collections
        </h1>
        <div class="flex mobile:flex-col items-center justify-center sm:flex-row sm:gap-16 gap-4">
            <x-cards.collection
                :imageSrc="asset('images/collections/homme.jpg')"
                :imageAlt="'Hommes Collection'"
                :collection="'Hommes'"
            />
            <x-cards.collection
                :imageSrc="asset('images/collections/femme.jpg')"
                :imageAlt="'Femmes Collection'"
                :collection="'Femmes'"
            />
        </div>
    </section>

    {{-- Promostions en cours --}}
    <div class="bg-gold flex flex-col gap-4 p-4 text-l">
        <h1 class="uppercase title place-self-center tracking-widest text-l sm:text-2xl">
            promotions en cours
        </h1>
        <div class="grid mobile:grid-cols-2 md:grid-cols-4 h-auto gap-8">
            @foreach($montres as $montre)
                <x-cards.promotion :$montre />
            @endforeach
            <a href="{{ route("montres.index") }}" class="bg-white sm:h-auto flex flex-col items-center justify-center gap-2 text-xl font-semibold hover:underline rounded">
                Explorer Toutes Les Montres
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>

    {{-- Pourquoi-nous --}}
    <section class="bg-gray flex flex-col gap-4 p-4">
        <h1 class="uppercase title place-self-center tracking-widest text-l sm:text-2xl">
            pourquoi-nous ?
        </h1>
        <div class="p-2 mobile:p-1/4 flex md:flex-row justify-evenly mobile:flex-col mobile:justify-center mobile:items-center mobile:gap-4">
            <div class="flex flex-col justify-center items-center mobile:w-3/4 w-1/4 text-l font-semibold break-words mobile:text-l">
                <x-iconoir-hand-cash class="sm:w-16 h-16 mobile:w-36" />
                <h2 class="uppercase">
                    paiment a la livraison
                </h2>
            </div>
            <div class="flex flex-col justify-center items-center mobile:w-3/4 w-1/4 text-l font-semibold break-words mobile:text-l">
                <x-hugeicons-delivery-delay-02 class="sm:w-16 h-16 mobile:w-36" />
                <h2 class="uppercase">
                    livraison rapide
                </h2>
            </div>
            <div class="flex flex-col justify-center items-center mobile:w-3/4 w-1/4 text-l font-semibold break-words mobile:text-l">
                <x-gmdi-workspace-premium-o class="sm:w-16 h-16 mobile:w-36" />
                <h2 class="uppercase">
                    véritable garantie
                </h2>
            </div>
        </div>
    </section>
@endsection
