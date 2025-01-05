<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable=['book_id','user_id'];

    public function book(){
        $this->belongsTo(Book::class);
    }
    public function user(){
        $this->belongsTo(User::class);
    }
}
