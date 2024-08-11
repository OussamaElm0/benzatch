@extends("layouts.app")

@section("title","Home")

@section("content")
    <section class="grid grid-cols-2 bg-black p-8">
        <div class="col-span-1 flex flex-col gap-8">
            <h1 class="font-cormorant text-white place-self-center font-bold text-9xl">
                Benzatch.
            </h1>
            <h3 class="text-gold font-poppins text-4xl tracking-widest place-self-center">
                LE TEMPS EST UN LUXE
            </h3>
            <p class="slogan h-[50px] text-gold opacity-80 place-self-center w-96 text-2xl font-poppins font-light">
            </p>
            <a href="#" class="relative inset-x-1/4  flex items-center justify-center text-center bg-gold text-black w-56 h-10 rounded font-semibold hover:bg-black hover:text-gold hover:border-gold hover:border-2">
                Découvrez nos offres
            </a>
        </div>
        <img
            src="{{ asset("images/hero-watch.png") }}"
            alt="Montre"
            class="w-auto h-3/5 col-span-1 mx-32"
        />
    </section>
@endsection
