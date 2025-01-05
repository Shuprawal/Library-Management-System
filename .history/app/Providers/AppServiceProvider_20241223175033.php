<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Genre;
use App\Models\Author;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer(['kitab', 'layouts.try'], function ($view) {
            $view->with('genres', Genre::all());
        });

        View::composer(['kitab', 'layouts.try'], function ($view) {
            $view->with('authors', Author::all());
        });

        View::composer(['kitab', 'layouts.try'], function ($view) {
            $view->with('publishers', Author::all());
        });
    }
}
