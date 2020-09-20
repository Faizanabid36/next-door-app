<?php

namespace App\Providers;

use App\Category;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
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

        \View::composer(['layouts.salika.header'],function ($view){
            $usersList = Message::where('from_id', auth()->user()->id)
                ->orWhere('to_id', auth()->user()->id)
                ->where('to_id', '!=', auth()->user()->id)
                ->distinct('from_id', 'to_id')
                ->pluck('to_id');
            foreach ($usersList as $u) {
                $messages[] = Message::latest()
                    ->whereFromId(auth()->user()->id)->whereToId($u)
                    ->orWhere('from_id', $u)->whereToId(auth()->user()->id)
                    ->first();
            }
        });

        Schema::defaultStringLength(191);

    }
}
