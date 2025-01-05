<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use 
    protected $fillable = ['name'];

    // In Author Model
    public function books() {
        return $this->belongsToMany(Book::class, 'book_authors', 'authorID', 'bookID');
    }

    public function ratings(){
        return $this->morphMany(Rating::class,'rateable');
    }

    public function averageRating(){
        return $this->ratings()->avg('rating');
    }

}
