<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =['review','user_id','book_id'];

    public function book(){
        $this->belongsTo(B)
    }
}
