<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_author extends Model
{
    protected $table = 'book_authors';
    protected $fillable = ['bookID','authorID'];
}
