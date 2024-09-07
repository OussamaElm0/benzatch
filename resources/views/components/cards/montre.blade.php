<article class="bg-white sm:h-auto flex flex-col p-2 rounded justify-between {{ $attributes->get('class') }}" >
    <a href="{{ route("montres.show",$montre) }}">
        <span  class="montre-images">
            @foreach($montre->images as $image)
                <img
                    src="{{ asset("storage/" . $image) }}"
                    alt="{{ $montre->serial_number }}"
                    class="h-60 w-full object-contain"
                    loading="lazy"
                />
            @endforeach
        </span>
        <h3 class="font-bold text-xl">
            {{ $montre->description }}
        </h3>
        <p class="text-l sm:text-xl">
            @if($montre->reduction != 0)
                <span class="font-light line-through">
                    {{ $montre->prix }} MAD
                </span>
            @endif
            <span class="font-semibold">
                {{ $montre->prix * (1 - $montre->reduction / 100) }} MAD
            </span>
            @if($montre->reduction != 0)
                <span class="font-semibold text-red-600">
                -{{ $montre->reduction }}%
            </span>
            @endif
        </p>
    </a>
    <button data-id="{{ $montre->id }}" data-url="{{ route('cart.addToCart') }}"
            class="add-to-cart rounded w-full h-auto p-2 text-white bg-black text-l hover:bg-gold hover:text-black"
    >
        Ajouter Au Panier
    </button>
</article>
