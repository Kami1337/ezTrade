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
        view()->composer('layouts.sidebar', function ($view)
        {
            //$view->with('archives', \App\Product::archives());
            $view->with('tags', \App\Tag::has('products')->pluck('name'));
        });
        view()->composer('products.create', function ($view)
        {
            //$view->with('archives', \App\Product::archives());
            $view->with('tags', \App\Tag::all());
            
        });
        view()->composer('products.edit', function ($view)
        {
            $view->with('tags', \App\Tag::all());           
        });
        view()->composer('layouts.carousel', function ($view)
        {
            $view->with('products', \App\Product::all()->where('status',!'1'));    
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
