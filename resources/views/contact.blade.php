@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <section class="flex flex-col p-8 bg-gray">
        <h1 class="uppercase title place-self-center tracking-widest text-2xl mobile:text-xl">
            besoin d'aide ? contactez-nous
        </h1>
        <article class="grid md:grid-cols-3 p-16 mobile:grid-cols-1 mobile:p-3 mobile:mt-2 mobile:gap-5">
            <!-- Form Section -->
            <div class="md:col-span-1">
                <form class="max-w-md mx-auto">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="prenom" id="prenom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-gold peer" placeholder=" " required />
                        <label for="prenom" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prenom</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-gold peer" placeholder=" " required />
                        <label for="nom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="tel" name="tel" id="tel" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-gold peer" placeholder=" " required />
                        <label for="tel" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro Télephone</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <textarea id="message" name="message" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-gold peer"></textarea>
                        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Message</label>
                    </div>
                    <button type="submit" class="text-black bg-gold hover:bg-black hover:text-white focus:ring-4 focus:outline-none focus:ring-gold font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Envoyer</button>
                </form>
            </div>

            <!-- Divider Section -->
            <div class="hidden md:flex justify-center items-center">
                <div class="border-l border-gray-300 h-full"></div>
            </div>

            <!-- Social Media Links Section -->
            <div class="md:col-span-1 flex flex-row justify-center items-center gap-12 mobile:flex-col mobile:gap-6">
                <div class="flex flex-col gap-3  items-center cursor-pointer hover:text-blue-600">
                    <x-bi-facebook class="w-8 h-8" />
                    <a href="#" class="font-poppins font-semibold text-l">
                        Facebook
                    </a>
                </div>
                <div class="flex flex-col gap-3 items-center cursor-pointer hover:text-pink-600">
                    <x-bi-instagram class="w-8 h-8" />
                    <a href="#" class="font-poppins font-semibold text-l">
                        @instagram
                    </a>
                </div>
                <div class="flex flex-col gap-3 items-center cursor-pointer hover:text-green-600">
                    <x-bi-whatsapp class="w-8 h-8" />
                    <a href="#" class="font-poppins font-semibold text-l">
                        06.12.34.56.78
                    </a>
                </div>
            </div>
        </article>
    </section>
@endsection
