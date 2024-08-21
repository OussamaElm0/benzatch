<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MontreController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function() {
    Route::get('/','home')->name('home');
});

Route::controller(MontreController::class)->group(function () {
    Route::get('montres','index')
        ->name('montres.index');
});
Route::controller(CartController::class)->group(function (){
    Route::post("cart/add","addToCart")
        ->name("cart.addToCart");
    Route::get('cart/items',"showItems")
        ->name("cart.showItems");
});
//To implement in controller
Route::get('/{brand}', function($brand){
    return $brand;
})->name("marques.products");

Route::get('/collections/{collection}', function ($collection){
    return $collection;
})->name("collection.show");

Route::get("montres/{montre}", function ($montre) {
    return $montre;
})->name("montres.show");
