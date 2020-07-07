<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;

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
    
        \View::composer('frontend.ecommerce.all_sale_items', function($view) {
            $categories=Category::all();
            $view->with('categories', $categories);
        });
      
        Schema::defaultStringLength(191);
       
    }
}
