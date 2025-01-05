<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boook extends Model{
    protected $table='books';
    protected $fillable = ['name', 'isbn', 'publisherid', 'genre', 'author_id', 'status', 'photo'];
}