@if(count($montres) !== 0)
    <section class="bg-gold flex flex-col gap-4 p-4 text-l" data-aos="fade-right">
        <h1 class="uppercase title place-self-center tracking-widest text-xl sm:text-2xl">
            promotions en cours
        </h1>
        <div class="grid mobile:grid-cols-1 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 h-auto gap-8">
            @foreach($montres as $montre)
                <x-cards.montre :$montre />
            @endforeach
            <a href="{{ route("montres.index") }}" class="bg-white sm:h-auto flex flex-col items-center justify-center sm:col-auto gap-1 p-2 text-xl text-center break-words font-semibold hover:underline rounded">
                Explorer Toutes Les Montres
                <x-heroicon-o-arrow-long-right class="w-8" />
            </a>
        </div>
    </section>

@endif
