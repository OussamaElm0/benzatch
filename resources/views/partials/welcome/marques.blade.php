<section class="bg-gray text-black flex sm:h-44 flex-col p-4 text-xl sm:text-2xl">
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
