<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function() {
    Route::get('/','home')->name('home');
});
Route::get('/{brand}', function($brand){
    return $brand;
})->name("marques.products");
Route::get('/collections/{collection}', function ($collection){
    return $collection;
})->name("collection.show");
