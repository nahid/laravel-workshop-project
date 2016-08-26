<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Blog;

class PartialsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('site.partials.nav', function($view) {
            $latest = Blog::orderBy('created_at', 'desc')->take(5)->get();
            $view->with(compact('latest'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
