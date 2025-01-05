<?php

namespace App\Models;

use hasFa
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

    protected $fillable=['book_id','user_id'];

    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
