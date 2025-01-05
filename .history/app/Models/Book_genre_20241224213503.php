<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_genre extends Model
{
    protected $table = 'book_genres';
    protected $fillable = ['book_ID','genreID'];
}
