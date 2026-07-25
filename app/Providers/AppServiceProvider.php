<?php

namespace App\Providers;

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
        view()->composer(
            ['layouts.frontend', 'layouts.app', 'frontend.partials.header', 'frontend.home.index', 'frontend.shop.index', 'frontend.product.show', 'frontend.cart.index', 'frontend.checkout.index'],
            \App\View\Composers\CartComposer::class
        );

        view()->composer(
            ['layouts.frontend', 'layouts.app', 'frontend.partials.header', 'frontend.home.index', 'frontend.shop.index', 'frontend.product.show', 'frontend.shop.partials.sidebar'],
            \App\View\Composers\CategoryComposer::class
        );
    }
}
