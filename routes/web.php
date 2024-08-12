<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function() {
    Route::get('/','home')->name('home');
});
Route::get('/{brand}', function($brand){
    return $brand;
})->name("marques.products");
