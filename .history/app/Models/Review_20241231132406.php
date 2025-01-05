<?php

namespace App\Models;

use App\Http\Controllers\BookController;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =['review','user_id','book_id'];

    // public function book(){
    //     return $this->belongsTo(Book::class);
    // }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
