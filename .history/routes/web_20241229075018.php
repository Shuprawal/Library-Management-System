<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ProController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;

Route::get('/login', function () {
    return view('login');
})->name('login');

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

Route::get('/', function () {
    return view('index');
})->name('home');



Route::get('/allist', function () {
    return view('authorlist');
})->name('authorlist');

Route::get('/addauthor', function () {
    return view('author.addauthor');
});


Route::get('/book', function () {
    return view('book');
})->name('book');

Route::get('/book2', function () {
    return view('book2');
})->name('book2');

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

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
})->name('list');


// Route::get('/booklist', function () {
//     return view('booklist');
// })->name('booklist');

Route::get('authorlist', [AuthorController::class, 'index'])->name('authorlist');
Route::delete('autorlist/{id}', [AuthorController::class, 'destroy'])->name('delete_author');

Route::get('genrelist', [GenreController::class, 'index'])->name('genrelist');
Route::delete('genrelist/{id}', [GenreController::class, 'destroy'])->name('delete_genre');

Route::get('publisherlist', [PublisherController::class, 'index'])->name('publisherlist');
Route::delete('publisher/{id}', [PublisherController::class, 'destroy'])->name('delete_publisher');


Route::get('allbooklist', [BookController::class, 'index'])->name('allbooklist');
Route::delete('allbooklist/{id}', [BookController::class, 'destroy'])->name('delete_book');

Route::get('/book/{id}', [BookController::class, 'show'])->name('book');


 Route::post('/publisherEdit/{id}', [PublisherController::class, 'edit'])->name('publisher_edit');


Route::get('/publisherEdit/{id}', [PublisherController::class, 'edit'])->name('publisher_edit');
Route::put('/publisherEdit/{id}', [PublisherController::class, 'update'])->name('publisher_update');



Route::post('/authorEdit/{id}', [AuthorController::class, 'edit'])->name('author_edit');


Route::get('/authorEdit/{id}', [AuthorController::class, 'edit'])->name('author_edit');
Route::put('/authorEdit/{id}', [AuthorController::class, 'update'])->name('author_update');


Route::post('/genreEdit/{id}',[GenreController::class,'edit'])->name('genre_edit');
Route::get('/genreEdit/{id}',[GenreController::class,'edit'])->name('genre_edit');
Route::put('genreEdit/{id}',[GenreController::class,'update'])->name('genre_update');

Route::get('bookEdit/{id}',[BookController::class,'edit'])->name('book_edit');
Route::post('bookEdit/{id}',[BookController::class,'edit'])->name('book_edit');
Route::put('bookEdit/{id}',[BookController::class,'update'])->name('book_update');

 Route::get('booklist/{id}',[BookController::class,'getBooksByGenre'])->name('booklist');







//  show profile

Route::middleware('auth')->group(function(){

    Route::get('profile',[ProfileController::class,'show'])->name('showProfile');
});