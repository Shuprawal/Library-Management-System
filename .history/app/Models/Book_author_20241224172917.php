<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_author extends Model
{
    protected $table = 'books';
    protected $fillable = ['name', 'isbn', 'description', 'available_copies', 'publisherID', 'image','genre','author'];
}
