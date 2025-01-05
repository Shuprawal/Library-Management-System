<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name'];

    public function books() {
        return $this->hasMany(Book::class, 'publisherID','id');
    }

    public function ratings(){
        return $this->morphMany(Rating::class,'rateable');
    }

    public function averageRating(){
        return $this->ratings()->avg('rating');
    }
}
