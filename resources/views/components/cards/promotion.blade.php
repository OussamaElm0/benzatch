<a href="{{ route("montres.show",$montre) }}" class="bg-white sm:h-auto flex flex-col p-2 rounded gap-2">
    <span  class="montre-images">
        @foreach($montre->images as $image)
            <img
                src="{{ asset("storage/" . $image) }}"
                alt="{{ $montre->serial_number }}"
                class="h-60 object-contain"
            />
        @endforeach
    </span>
    <h3>{{ $montre->marque->brand }} - {{ $montre->serial_number }}</h3>
    <p class="text-l sm:text-xl">
        <span class="font-light line-through">
            {{ $montre->prix }}
        </span>
        <span class="font-semibold">
            {{ $montre->prix - ($montre->reduction * 10) }} MAD
        </span>
        <span class="font-semibold text-red-600">
            -{{ $montre->reduction }}%
        </span>
    </p>
    <button class="rounded w-full h-auto p-2 text-white bg-black text-l hover:bg-gold hover:text-black">
        Ajouter Au Panier
    </button>
</a>
