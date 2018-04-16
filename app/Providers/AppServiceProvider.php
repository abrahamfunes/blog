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
            $categories = \App\Models\Category::whereStatusId(1)->where('id', '!=', 4)->get();
            #$posts = \App\Models\Post::whereStatusId(1)->orderBy('id', 'DESC')->get();
            if(\App::getLocale() == 'es'){
                $recents = \App\Models\Post::with('file')->whereStatusId(1)->where('category_id', '=', 4)->orderBy('id', 'DESC')->limit(6)->get();
            }else if(\App::getLocale() == 'en'){
                $recents = \App\Models\Post::with('file')->whereStatusId(1)->where('category_id', '=', 4)->where('title_en', '!=', '')->orderBy('id', 'DESC')->limit(6)->get();
            }else if(\App::getLocale() == 'cn'){
                $recents = \App\Models\Post::with('file')->whereStatusId(1)->where('category_id', '=', 4)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->limit(6)->get();
            }else{
                $recents = \App\Models\Post::with('file')->whereStatusId(1)->where('category_id', '=', 4)->orderBy('id', 'DESC')->limit(6)->get();
            }


            $view->with('categories', $categories)
                #->with('posts', $posts)
                ->with('recents', $recents);

        });

        view()->composer('layouts.header', function ($view) {
            $categories = \App\Models\Category::whereStatusId(1)->where('id', '!=', 4)->get();

            $view->with('categories', $categories);
        });

        view()->composer('layouts.footer', function ($view) {


            if(\App::getLocale() == 'es'){
                $recents = \App\Models\Post::whereStatusId(1)->whereCategoryId(4)->orderBy('id', 'DESC')->limit(6)->get();
            }else if(\App::getLocale() == 'en'){
                $recents = \App\Models\Post::whereStatusId(1)->whereCategoryId(4)->where('title_en', '!=', '')->orderBy('id', 'DESC')->limit(6)->get();
            }else if(\App::getLocale() == 'cn'){
                $recents = \App\Models\Post::whereStatusId(1)->whereCategoryId(4)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->limit(6)->get();
            }else{
                $recents = \App\Models\Post::whereStatusId(1)->whereCategoryId(4)->orderBy('id', 'DESC')->limit(6)->get();
            }

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
        $this->app->bind('path.public', function() {
            return base_path().'/public_html';
        });
    }
}
