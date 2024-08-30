<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\MontreController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function() {
    Route::get('/','home')->name('home');
});

Route::controller(MontreController::class)->group(function () {
    Route::get('montres','index')
        ->name('montres.index');
    Route::get('/collections/{collection}','parCollection')->name("collection.show");
    Route::get('/marques/{brand}', 'parMarque')->name("marques.products");
    Route::get("montres/{montre}", 'show')->name("montres.show");
});

Route::controller(CartController::class)->group(function (){
    Route::post("cart/add","addToCart")
        ->name("cart.addToCart");
    Route::get('cart/items',"showItems")
        ->name("cart.showItems");
});

Route::post('commande',CommandeController::class)
    ->name('commande.store');

Route::view("contact","contact")
    ->name('contact');

