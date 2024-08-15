<section class="bg-gold text-black flex flex-col gap-4 p-4 text-xl sm:text-2xl">
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
