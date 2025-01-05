<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name', 'isbn', 'publisher_id', 'genre', 'author_id', 'status', 'photo'];
}
