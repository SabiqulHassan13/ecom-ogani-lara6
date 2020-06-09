<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        View::composer('frontend.master',function ($view) {
            $publishedCategories = Category::where('publication_status', 1)->get();
            $view->with('publishedCategories', $publishedCategories);            
        });

        // shopping cart info in frontend template
        // View::composer(['frontend.master'], function($view) {
        //     $view->with('cartCount', Cart::getContent()->count());
        // });

    }
}
