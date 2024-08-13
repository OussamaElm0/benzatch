<a href="{{ route("collection.show",strtolower($collection)) }}" class="collection-card relative w-3/4 h-64 md:w-2/6 lg:w-1/4 md:h-80 bg-white hover:cursor-pointer">
    <img
        src="{{ $imageSrc }}"
        alt="{{ $imageAlt }}"
        class="w-full h-full absolute transition z-0 duration-300 ease-in-out transform"
    />
    <h1 class="place-self-center absolute text-3xl inset-0 z-10 opacity-0 transition-opacity duration-300 ease-in-out">
        {{ $collection }}
    </h1>
</a>
