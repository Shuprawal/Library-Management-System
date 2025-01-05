<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function books() {
        return $this->belongsToMany(Book::class, 'book_geners', 'author_id', 'book_id');
    }
}
