<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_genre extends Model
{
    protected $table = 'book_gs';
    protected $fillable = ['bookID','authorID'];
}
