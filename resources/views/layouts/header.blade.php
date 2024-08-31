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
            <button id="perCollectionsDropdownButton" data-dropdown-toggle="perCollectionsDropdown" class="text-white  hover:bg-gold hover:text-black focus:ring-2 focus:outline-none focus:ring-gold font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                Filtrer par <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="perCollectionsDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="multiLevelDropdownButton">
                    <li>
                        <button id="collectionDropdownButton" data-dropdown-toggle="collectionDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-[#e5e7eb]">
                            Collections<svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg></button>
                        <div id="collectionDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                <li>
                                    <a href="{{ route('collection.show','hommes') }}" class="block px-4 py-2 hover:bg-[#e5e7eb]">
                                        Hommes
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('collection.show','femmes') }}" class="block px-4 py-2 hover:bg-[#e5e7eb]">
                                        Femmes
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button id="marquesDropdownButton" data-dropdown-toggle="marquesDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-[#e5e7eb]">
                            Marques<svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg></button>
                        <div id="marquesDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                @foreach($marques as $brand)
                                    <li>
                                        <a href="{{ route('marques.products',$brand) }}" class="block px-4 py-2 hover:bg-gray-100 hover:bg-[#e5e7eb]">
                                            {{ $brand }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="{{ route('contact') }}" class="hover:scale-110 px-3 py-2 nav-link rounded {{ request()->routeIs('') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
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

        <!-- Collections Dropdown Button -->
        <button id="perCollectionsDropdownButton" data-dropdown-toggle="perCollectionsDropdownResponsive" class="text-white hover:bg-gold hover:text-black focus:ring-2 focus:outline-none focus:ring-gold font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center w-full justify-center" type="button">
            Filtrer par
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="perCollectionsDropdownResponsive" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-auto dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="perCollectionsDropdownButton">
                <li>
                    <button id="collectionDropdownButton" data-dropdown-toggle="collectionDropdownResponsive" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-[#e5e7eb]">
                        Collections
                        <svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </button>
                    <div id="collectionDropdownResponsive" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-full">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="collectionDropdownButton">
                            <li>
                                <a href="{{ route('collection.show','hommes') }}" class="block px-4 py-2 hover:bg-[#e5e7eb]">
                                    Hommes
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('collection.show','femmes') }}" class="block px-4 py-2 hover:bg-[#e5e7eb]">
                                    Femmes
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button id="marquesDropdownButton" data-dropdown-toggle="marquesDropdownResponsive" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-[#e5e7eb]">
                        Marques
                        <svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </button>
                    <div id="marquesDropdownResponsive" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-full">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="marquesDropdownButton">
                            @foreach($marques as $brand)
                                <li>
                                    <a href="{{ route('marques.products',$brand) }}" class="block px-4 py-2 hover:bg-gray-100 hover:bg-[#e5e7eb]">
                                        {{ $brand }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <a href="#" class="block hover:scale-110 nav-link rounded {{ request()->routeIs('') ? 'text-gold font-bold active' : 'text-white hover:text-gold' }}">
            Contact
        </a>
    </div>
</nav>
