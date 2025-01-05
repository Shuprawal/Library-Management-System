<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\GenreController;
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



Route::get('/allist', function () {
    return view('authorlist');
});

Route::get('/addauthor', function () {
    return view('author.addauthor');
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

Route::get('/kitab', function () {
    return view('kitab');
})->name('kitab');

Route::get('/addmore', function () {
    return view('addmore');
});

Route::get('/addgenre', function () {
    return view('addgenre');
});

Route::get('/addpublisher', function () {
    return view('addpublisher');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Route ::get('addpublisher',[PublisherController::class, 'index'])->name('publisher.index');
// Route ::get('addpublisher',[PublisherController::class, 'create'])->name('publisher.create');
// Route ::post('pulish',[PublisherController::class, 'store'])->name('publisher.store');


// Display a list of publishers (index)
Route::get('publishers', [PublisherController::class, 'index'])->name('publisher.index');

// Display the form to add a publisher (create)
Route::get('addpublisher', [PublisherController::class, 'create'])->name('publisher.create');

// Store the new publisher (store)
Route::post('addpublisher', [PublisherController::class, 'store'])->name('publisher.store');
Route::post('addpublisher', [PublisherController::class, 'store'])->name('publisher.store');
Route::post('kitab', [BookController::class, 'store'])->name('book.store');






Route::get('genres', [GenreController::class, 'index'])->name('genre.index');


Route::get('addgenre', [GenreController::class, 'create'])->name('genre.create');


Route::post('addgenre', [GenreController::class, 'store'])->name('genre.store');

// Route::get('/books/{genre}', [BookController::class, 'listByGenre'])->name('booklist');




Route::get('authors', [AuthorController::class, 'index'])->name('author.index');


Route::get('addauthor', [AuthorController::class, 'create'])->name('author.create');


Route::post('addauthor', [AuthorController::class, 'store'])->name('author.store');




Route::get('books', [BookController::class, 'index'])->name('book.index');


Route::get('kitab', [BookController::class, 'create'])->name('book.create');


Route::post('kitab', [BookController::class, 'store'])->name('book.store');

// Route::post('/kitab', [BookController::class, 'store']);

Route::get('/addNewBook',function(){
    return view('addNewBook');
})->name('new');


Route::get('/list', function () {
    return view('list');
});

Route::get('authorlist', [AuthorController::class, 'index'])->name('authorlist');
Route::delete('autorlist/{id}', [AuthorController::class, 'destroy'])->name('delete_author');

Route::get('genrelist', [GenreController::class, 'index'])->name('genrelist');
Route::delete('genrelist/{id}', [GenreController::class, 'destroy'])->name('delete_genre');

Route::get('publisherlist', [PubController::class, 'index'])->name('genrelist');
Route::delete('genrelist/{id}', [GenreController::class, 'destroy'])->name('delete_genre');