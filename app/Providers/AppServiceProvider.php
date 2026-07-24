<?php

namespace App\Providers;

use App\View\Composers\NavbarComposer;
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
        // Supplies $navCategories to the navbar partial on every page
        // (see app/View/Composers/NavbarComposer.php) — the Categories
        // dropdown data, without every controller needing to pass it.
        View::composer('partials.navbar', NavbarComposer::class);
    }
}