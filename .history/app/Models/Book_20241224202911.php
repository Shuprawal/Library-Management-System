<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $table = 'books';
    protected $fillable = ['name', 'isbn', 'description', 'available_copies', 'publisherID', 'image','genre','author'];

    // In Book Model
    public function authors() {
        return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id');
    }

    public function geners() {
        return $this->belongsToMany(Gen::class, 'book_authors', 'book_id', 'author_id');
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class, 'publisherID');
    }


}


