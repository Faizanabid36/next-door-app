<?php

namespace App\Providers;

use App\Category;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Chatify\Http\Models\Message;

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
        \View::composer(['web.frontend.sale_and_business.list_items','frontend.ecommerce.all_sale_items'], function ($view) {
            $categories = Cache::remember('articles', 15, function () {
                return Category::all();
            });
            $view->with('categories', $categories);
        });

        Schema::defaultStringLength(191);

    }
}
