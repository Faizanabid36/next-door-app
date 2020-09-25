<?php

namespace App\Providers;

use App\Category;
use Chatify\Http\Models\Message;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        \View::composer(['web.frontend.sale_and_business.list_items', 'frontend.ecommerce.all_sale_items'], function ($view) {
            $categories = Cache::remember('articles', 15, function () {
                return Category::all();
            });
            $view->with('categories', $categories);
        });


        \View::composer(['layouts.salika.header', 'layouts.salika.chat_sidebar'], function ($view) {
            $messages = [];
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
            $users = \App\User::whereIn('id', $usersList)->orderBy('name', 'ASC')->get();
            $view->with(['messages' => $messages, 'users' => $users]);
        });

        Schema::defaultStringLength(191);

    }
}
