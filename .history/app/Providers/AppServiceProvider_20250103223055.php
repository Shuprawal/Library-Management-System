<?php

namespace App\Providers;

use App\Models\Publisher;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;
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
        View::composer(['kitab', 'allbooklist', 'layouts.try'], function ($view) {
            $view->with('genres', Genre::all());
        });

        View::composer(['kitab', 'allbooklist', 'layouts.try'], function ($view) {
            $view->with('authors', Author::all());
        });

        View::composer(['kitab', 'allbooklist', 'layouts.try'], function ($view) {
            $view->with('publishers', Publisher::all());
        });

        View::composer([ 'index'], function ($view) {
            $view->with('books', Book::with(['authors', 'genres', 'publisher'])->get());
        });


       
    }
}
