@extends("layouts.app")

@section("title", "Cart")

@section("content")
    <h1 class="text-center text-l md:text-2xl font-bold font-poppins mt-4">
        Panier
    </h1>
    <section class="p-8">
        <div class="relative overflow-x-auto">
            @livewire('cart.show-cart')
        </div>
    </section>
@endsection
