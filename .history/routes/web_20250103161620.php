<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::fallback(function () {
//     return redirect()->route('dashboard'); // Replace with an existing route
// });

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

// Route::get('/', function () {
//     return view('index');
// })->name('home');

// Route::get('/', function () {
//     return view('index');
// })->name('index');

Route::get('/index', [HomeController::class, 'index'])->name('home');
//Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

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

// Route::get('/requestlist', function () {
//     return view('borrowRequest');
// })->name('requestlist');

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

//Route::get('/book/{id}', [ReviewController::class, 'show'])->name('book');

Route::post('/book/{id}', [ReviewController::class, 'store'])->name('addReview');






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


 Route::get('borrowHistory',[BorrowController::class,'showHistory'])->name('borrowHistory');
  


Route::middleware(['admin'])->group(function () {

    Route::get('borrowRequest',[BorrowController::class,'show'])->name('requestList');



});



//  show profile

Route::middleware('auth')->group(function(){

    Route::get('profile',[ProfileController::class,'show'])->name('showProfile');
    Route::get('addprofile',[ProfileController::class,'create'])->name('profilecreate');
    Route::post('addprofile',[ProfileController::class,'store'])->name('profilecreate');
    Route::get('profileEdit',[ProfileController::class,'edit'])->name('profile_edit');
    Route::post('profileEdit',[ProfileController::class,'edit'])->name('profile_edit');
    Route::put('profileUpdate',[ProfileController::class,'update'])->name('profile_update');


    Route::get('wishlist',[WishlistController::class,'show'])->name('showWishlist');
    Route::post('wishlist/{id}',[WishlistController::class,'store'])->name('wishlist');
    Route::delete('wishlist/{id}',[WishlistController::class,'destroy'])->name('delete_wishlist');


    Route::post('/book/{type}/{id}', [RatingController::class, 'store'])->name('rate');

    Route::post('borrowRequest/{book}',[BorrowController::class,'store'])->name('book_borrow');
    
}); 




Route::patch('borrow/approve/{borrow}', [BorrowController::class, 'approveRequest'])->name('approve_request');
Route::patch('borrow/deny/{borrow}', [BorrowController::class, 'destroy'])->name('deny_request');

Route::patch('borrow/return/{borrow}', [BorrowController::class, 'returnBook'])->name('book_return');



Route::get('/list', [BookController::class, 'sortList'])->name('book_list');


Route::delete('/book/{id}', [ReviewController::class, 'destroy'])->name('delete_review');


Route::patch('/books/{book}/feature',[BookController::class,'feature'])->name('book_feature');

Route::patch('/index/{book}',[BookController::class,'removeFeature'])->name('remove_feature');

Route::get('/index', [BookController::class, 'featureList'])->name('home');

Route::get('/index/borrow', [BorrowController::class, 'totalCount'])->name('index');

Route::get('search',[BookController::class,''])

