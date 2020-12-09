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
        \Illuminate\Support\Facades\URL::forceScheme('https');
        \View::composer(['web.frontend.sale_and_business.list_items', 'frontend.ecommerce.all_sale_items'], function ($view) {
            $categories = Cache::remember('articles', 15, function () {
                return Category::all();
            });
            $view->with('categories', $categories);
        });


        \View::composer(['layouts.salika.header', 'layouts.salika.chat_sidebar'], function ($view) {
            $messages = [];
            $fromMe = Message::whereFromId(auth()->user()->id)->distinct('to_id')->pluck('to_id')->first();
            $usersList[] = $fromMe;
            $toMe = Message::whereToId(auth()->user()->id)->distinct('from_id')->pluck('from_id')->first();
            $usersList[] = $toMe;
            foreach ($usersList as $u) {
                if (!is_null($u))
                    $messages[] = Message::latest()
                        ->whereFromId(auth()->user()->id)->whereToId($u)
                        ->orWhere('from_id', $u)->whereToId(auth()->user()->id)
                        ->first();
            }
            $messages = collect($messages)->filter(function ($value, $key) {
                return $value != null;
            })->values();
            $users = \App\User::whereIn('id', $usersList)->orderBy('name', 'ASC')->get();
            $view->with(['messages' => $messages, 'users' => $users]);
        });

        Schema::defaultStringLength(191);

    }
}
