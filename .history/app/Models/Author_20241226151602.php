<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name'];

    // In Author Model
    public function books() {
        // return $this->belongsToMany(Book::class, 'book_authors', 'author_id', 'book_id');
        return $this->belongsToMany(Book::class, 'book_authors', 'authorID', 'bookID');
    }

}
