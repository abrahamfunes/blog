<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.layout-sidebar', function ($view) {
            $categories = \App\Models\Category::whereStatusId(1)->get();
            #$posts = \App\Models\Post::whereStatusId(1)->orderBy('id', 'DESC')->get();
            $recents = \App\Models\Post::with('file')->whereStatusId(1)->orderBy('id', 'DESC')->limit(6)->get();

            $view->with('categories', $categories)
                #->with('posts', $posts)
                ->with('recents', $recents);

        });

        view()->composer('layouts.footer', function ($view) {
            $recents = \App\Models\Post::whereStatusId(1)->orderBy('id', 'DESC')->limit(6)->get();

            $view->with('recents', $recents);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
