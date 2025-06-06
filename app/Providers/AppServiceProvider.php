<?php

namespace App\Providers;

use App\Models\Marque;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('marques',Marque::orderBy('brand', 'asc')->pluck('brand'));
    }
}
