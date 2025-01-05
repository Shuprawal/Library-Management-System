<?php

use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});

Route::get('/data', function () {
    return view('data');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/new', function () {
    return view('new');
});

Route::get('/try', function () {
    return view('index');
});

Route::get('/list', function () {
    return view('list');
});

Route::get('/allist', function () {
    return view('authorlist');
});


Route::get('/book', function () {
    return view('book');
});

Route::get('/booklist', function () {
    return view('booklist');
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/addbook', function () {
    return view('addbook');
});

Route::get('/addmore', function () {
    return view('addmore');
});

Route::get('/addpublisher', function () {
    return view('addpublisher');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route ::get('addpublisher',[PublisherController::class, 'create'])->name('publisher.create');
Route ::get('pulish',[PublisherController::class, 'store'])->name('publisher.store');


