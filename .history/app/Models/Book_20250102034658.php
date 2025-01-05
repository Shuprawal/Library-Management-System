<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $table = 'books';
    // protected $fillable = ['name', 'isbn', 'description', 'available_copies', 'publisherID', 'image','genre','author'];
    protected $fillable = ['name', 'isbn', 'description', 'available_copies', 'publisherID', 'image'];

    // In Book Model
    public function authors() {
        // return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id');
        return $this->belongsToMany(Author::class, 'book_authors', 'bookID', 'authorID');
    }

    public function genres(){
    return $this->belongsToMany(Genre::class, 'book_genres', 'book_id', 'genre_id');
    }


    public function publisher() {
        return $this->belongsTo(Publisher::class, 'publisherID');
    }

    public function decreaseCopies()
    {
        if ($this->available_copies > 0) {
            $this->available_copies--;
            $this->save();
        }
    }

    public function increaseCopies()
    {
        $this->available_copies++;
        $this->save();
    }

    public function rating(){}

}


