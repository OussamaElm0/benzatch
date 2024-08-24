<nav class="bg-black p-4 fixed top-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center">
        <a class="text-white text-2xl font-bold font-cormorant" href="{{ route('home') }}">
            Benzatch
        </a>
        <div id="nav-links" class="hidden md:flex space-x-4">
            <a href="{{ route('home') }}" class="hover:scale-110 px-3 py-2 nav-link rounded {{ request()->routeIs('home') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
                Acceuil
            </a>
            <a href="{{ route('montres.index') }}" class="hover:scale-110 px-3 py-2 nav-link rounded {{ request()->is('montres*') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
                Nos Montres
            </a>
            <a href="#" class="hover:scale-110 px-3 py-2 nav-link rounded {{ request()->routeIs('') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
                Marques
            </a>
            <a href="#" class="hover:scale-110 px-3 py-2 nav-link rounded {{ request()->routeIs('') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
                Contact
            </a>
        </div>
        <a href="{{ route('cart.showItems') }}" class="text-white w-8 cursor-pointer hover:text-gold">
            @if(!is_array(session()->get('cart')) || count(session()->get('cart')) == 0)
                <x-clarity-shopping-cart-line />
            @else
                <x-clarity-shopping-cart-outline-badged />
            @endif
        </a>
        <button id="menu-button" class="md:hidden text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    <!-- Responsive menu (initially hidden) -->
    <div id="mobile-menu" class="md:hidden hidden space-y-4 px-4 py-2 flex flex-col items-center">
        <a href="{{ route('home') }}" class="block hover:scale-110 nav-link rounded {{ request()->routeIs('home') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
            Acceuil
        </a>
        <a href="{{ route('montres.index') }}" class="block hover:scale-110 nav-link rounded {{ request()->is('montres*') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
            Nos Montres
        </a>
        <a href="#" class="block hover:scale-110 nav-link rounded {{ request()->routeIs('') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
            Marques
        </a>
        <a href="#" class="block hover:scale-110 nav-link rounded {{ request()->routeIs('') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
            Contact
        </a>
    </div>
</nav>
