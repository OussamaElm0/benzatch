<nav class="bg-black p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a class="text-white text-2xl font-bold font-cormorant" href="{{ route('home') }}">
            Benzatch
        </a>
        <div class="hidden md:flex space-x-4">
            <a href="#" class="text-white hover:text-gold  hover:scale-110 px-3 py-2 rounded">Acceuil</a>
            <a href="#" class="text-white hover:text-gold hover:scale-110 px-3 py-2 rounded">Produits</a>
            <a href="#" class="text-white hover:text-gold hover:scale-110 px-3 py-2 rounded">Marques</a>
            <a href="#" class="text-white hover:text-gold hover:scale-110 px-3 py-2 rounded">Contact</a>
        </div>
        <div class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
        </div>
        <button id="menu-button" class="md:hidden text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    <div id="menu" class="md:hidden hidden bg-gray-700 mt-2">
        <a href="#" class="block text-white px-4 py-2 hover:bg-gray-600">Home</a>
        <a href="#" class="block text-white px-4 py-2 hover:bg-gray-600">About</a>
        <a href="#" class="block text-white px-4 py-2 hover:bg-gray-600">Services</a>
        <a href="#" class="block text-white px-4 py-2 hover:bg-gray-600">Contact</a>
    </div>
</nav>
